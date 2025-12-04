<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $projects = Project::all();
        $clients = Client::orderBy('order')->get();
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        $settings = Setting::all()->pluck('value', 'key');

        return view('dashboard', compact('services', 'projects', 'clients', 'contacts', 'settings'));
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

        return redirect()->back()->with('success', 'Settings updated successfully.');
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

        return redirect()->back()->with('success', 'Service created successfully.');
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

        return redirect()->back()->with('success', 'Service updated successfully.');
    }

    public function destroyService(Service $service)
    {
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'required|string',
        ]);

        Project::create($validated);

        return redirect()->back()->with('success', 'Project created successfully.');
    }

    public function updateProject(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'required|string',
        ]);

        $project->update($validated);

        return redirect()->back()->with('success', 'Project updated successfully.');
    }

    public function destroyProject(Project $project)
    {
        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully.');
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

        return redirect()->back()->with('success', 'Client created successfully.');
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

        return redirect()->back()->with('success', 'Client updated successfully.');
    }

    public function destroyClient(Client $client)
    {
        // Delete logo file
        if ($client->logo && file_exists(public_path($client->logo))) {
            unlink(public_path($client->logo));
        }
        
        $client->delete();


        return redirect()->back()->with('success', 'Client deleted successfully.');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'شكراً لتواصلك معنا! سنرد عليك في أقرب وقت ممكن.');
    }

    public function toggleReadContact(Contact $contact)
    {
        $contact->update(['is_read' => !$contact->is_read]);
        return redirect()->back()->with('success', 'تم تحديث حالة الرسالة.');
    }

    public function destroyContact(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success', 'تم حذف الرسالة بنجاح.');
    }
}
