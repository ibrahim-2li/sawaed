<?php


namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Client;
use App\Models\Brand;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $projects = Project::all();
        $clients = Client::orderBy('order')->get();
        $brands = Brand::orderBy('order')->get();
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        $settings = Setting::all()->pluck('value', 'key');

        return view('dashboard', compact('services', 'projects', 'clients', 'brands', 'contacts', 'settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except(['_token', 'about_image']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            
            Setting::updateOrCreate(
                ['key' => 'about_image'],
                ['value' => 'images/' . $filename]
            );
        }

        return redirect()->route('dashboard')->with('success', 'Settings updated successfully.')->withFragment('settings');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/services'), $imageName);
            $validated['image'] = 'images/services/' . $imageName;
        }

        Service::create($validated);

        return redirect()->route('dashboard')->with('success', 'Service created successfully.')->withFragment('services');
    }

    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }
            
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/services'), $imageName);
            $validated['image'] = 'images/services/' . $imageName;
        }

        $service->update($validated);

        return redirect()->route('dashboard')->with('success', 'Service updated successfully.')->withFragment('services');
    }

    public function destroyService(Service $service)
    {
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return redirect()->route('dashboard')->with('success', 'Service deleted successfully.')->withFragment('services');
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'required|string',
        ]);

        Project::create($validated);

        return redirect()->route('dashboard')->with('success', 'Project created successfully.')->withFragment('projects');
    }

    public function updateProject(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'required|string',
        ]);

        $project->update($validated);

        return redirect()->route('dashboard')->with('success', 'Project updated successfully.')->withFragment('projects');
    }

    public function destroyProject(Project $project)
    {
        $project->delete();

        return redirect()->route('dashboard')->with('success', 'Project deleted successfully.')->withFragment('projects');
    }

    public function storeClient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('images/clients'), $logoName);
            $validated['logo'] = 'images/clients/' . $logoName;
        }

        Client::create($validated);

        return redirect()->route('dashboard')->with('success', 'Client created successfully.')->withFragment('clients');
    }

    public function updateClient(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($client->logo && file_exists(public_path($client->logo))) {
                unlink(public_path($client->logo));
            }
            
            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('images/clients'), $logoName);
            $validated['logo'] = 'images/clients/' . $logoName;
        }

        $client->update($validated);

        return redirect()->route('dashboard')->with('success', 'Client updated successfully.')->withFragment('clients');
    }

    public function destroyClient(Client $client)
    {
        // Delete logo file
        if ($client->logo && file_exists(public_path($client->logo))) {
            unlink(public_path($client->logo));
        }
        
        $client->delete();


        return redirect()->route('dashboard')->with('success', 'Client deleted successfully.')->withFragment('clients');
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
            $timeElapsed = time() - (int)$formToken;
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

    public function toggleReadContact(Contact $contact)
    {
        $contact->update(['is_read' => !$contact->is_read]);
        return redirect()->route('dashboard')->with('success', 'تم تحديث حالة الرسالة.')->withFragment('messages');
    }


    public function destroyContact(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('dashboard')->with('success', 'تم حذف الرسالة بنجاح.')->withFragment('messages');
    }

    public function storeBrand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('images/brands'), $logoName);
            $validated['logo'] = 'images/brands/' . $logoName;
        }

        Brand::create($validated);

        return redirect()->route('dashboard')->with('success', 'Brand created successfully.')->withFragment('brands');
    }

    public function updateBrand(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($brand->logo && file_exists(public_path($brand->logo))) {
                unlink(public_path($brand->logo));
            }
            
            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('images/brands'), $logoName);
            $validated['logo'] = 'images/brands/' . $logoName;
        }

        $brand->update($validated);

        return redirect()->route('dashboard')->with('success', 'Brand updated successfully.')->withFragment('brands');
    }

    public function destroyBrand(Brand $brand)
    {
        // Delete logo file
        if ($brand->logo && file_exists(public_path($brand->logo))) {
            unlink(public_path($brand->logo));
        }
        
        $brand->delete();

        return redirect()->route('dashboard')->with('success', 'Brand deleted successfully.')->withFragment('brands');
    }
}
