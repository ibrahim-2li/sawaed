<?php

namespace App\Livewire\Dashboard;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class Services extends Component
{
    use WithFileUploads;

    public $title;

    public $description;

    public $color = 'primary';

    public $icon;

    public $image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string', // Changed to required as per HTML
        'color' => 'required|string',
        'icon' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ];

    public function store()
    {
        $validatedData = $this->validate();

        if ($this->image) {
            $filename = time().'_'.$this->image->getClientOriginalName();
            $path = $this->image->getRealPath();
            if (! file_exists(public_path('images/services'))) {
                mkdir(public_path('images/services'), 0777, true);
            }
            copy($path, public_path('images/services/'.$filename));
            $validatedData['image'] = 'images/services/'.$filename;
        }

        Service::create($validatedData);

        $this->reset(['title', 'description', 'color', 'icon', 'image']);
        $this->description = ''; // Explicit reset if needed
        $this->color = 'primary'; // Reset to default

        session()->flash('success', 'تم إضافة الخدمة بنجاح.');
        $this->dispatch('service-created'); // Optional, if needed
    }

    public function render()
    {
        return view('livewire.dashboard.services', [
            'services' => Service::all(),
        ]);
    }
}
