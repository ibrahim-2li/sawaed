<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('dashboard', compact('contacts'));
    }

    public function submitContact(Request $request)
    {
        // Anti-spam validation: Honeypot check
        // If the 'website' field is filled, it's likely a bot
        if ($request->filled('website')) {
            // Silently reject spam without alerting the bot
            return redirect()->route('home')->with('success', 'شكراً لتواصلك معنا! سنرد عليك في أقرب وقت ممكن.')->withFragment('contact');
        }

        // Anti-spam validation: Time-based check
        // يجب أن يكون النموذج مفتوحًا لمدة 3 ثوانٍ على الأقل قبل الإرسال (Form must be open for at least 3 seconds before submission)
        $formToken = $request->input('form_token');
        if ($formToken) {
            $timeElapsed = time() - (int) $formToken;
            if ($timeElapsed < 3) {
                // Form submitted too quickly - likely a bot
                return redirect()->route('home')->with('success', 'شكراً لتواصلك معنا! سنرد عليك في أقرب وقت ممكن.')->withFragment('contact');
            }
        }

        // Anti-spam validation: Rate limiting by IP
        // Prevent same IP from submitting multiple times within 1 minute
        $recentSubmission = Contact::where('created_at', '>=', now()->subMinute())
            ->where(function ($query) use ($request) {
                $query->where('email', $request->email)
                    ->orWhere('phone', $request->phone);
            })
            ->first();

        if ($recentSubmission) {
            return redirect()->route('home')
                ->with('success', 'لقد استلمنا رسالتك بالفعل. سنرد عليك قريباً!')
                ->withFragment('contact');
        }

        // Validate the actual form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($validated);

        return redirect()->route('home')->with('success', 'شكراً لتواصلك معنا! سنرد عليك في أقرب وقت ممكن.')->withFragment('contact');
    }
}
