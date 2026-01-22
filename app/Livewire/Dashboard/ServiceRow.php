<?php

namespace App\Livewire\Dashboard;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceRow extends Component
{
    use WithFileUploads;

    public Service $service;

    public $title;

    public $description;

    public $color;

    public $icon;

    public $image; // stores current image path string for display

    public $new_image; // stores new uploaded file

    public $editMode = false;

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->title = $service->title;
        $this->description = $service->description;
        $this->color = $service->color;
        $this->icon = $service->icon;
        $this->image = $service->image;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'required|string',
            'new_image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'color' => $this->color,
            'icon' => $this->icon,
        ];

        if ($this->new_image) {
            // Delete old image
            if ($this->service->image && file_exists(public_path($this->service->image))) {
                unlink(public_path($this->service->image));
            }

            $filename = time().'_'.$this->new_image->getClientOriginalName();
            $path = $this->new_image->getRealPath();
            if (! file_exists(public_path('images/services'))) {
                mkdir(public_path('images/services'), 0777, true);
            }
            copy($path, public_path('images/services/'.$filename));

            $data['image'] = 'images/services/'.$filename;
            $this->image = $data['image'];
            $this->new_image = null;
        }

        $this->service->update($data);
        $this->editMode = false;

        session()->flash('success', 'تم تحديث الخدمة بنجاح.');
    }

    public function delete()
    {
        if ($this->service->image && file_exists(public_path($this->service->image))) {
            unlink(public_path($this->service->image));
        }

        $this->service->delete();

        session()->flash('success', 'تم حذف الخدمة بنجاح.');

        return redirect()->route('dashboard'); // Refresh page to update list
    }

    public function render()
    {
        return view('livewire.dashboard.service-row');
    }
}
