<?php

namespace App\Livewire\Dashboard;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandRow extends Component
{
    use WithFileUploads;

    public Brand $brand;

    public $name;

    public $logo; // current logo path

    public $new_logo; // new upload

    public $order;

    public $editMode = false;

    public function mount(Brand $brand)
    {
        $this->brand = $brand;
        $this->name = $brand->name;
        $this->logo = $brand->logo;
        $this->order = $brand->order;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'new_logo' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'name' => $this->name,
            'order' => $this->order,
        ];

        if ($this->new_logo) {
            // Delete old logo
            if ($this->brand->logo && file_exists(public_path($this->brand->logo))) {
                unlink(public_path($this->brand->logo));
            }

            $filename = time().'_'.$this->new_logo->getClientOriginalName();
            $path = $this->new_logo->getRealPath();
            if (! file_exists(public_path('images/brands'))) {
                mkdir(public_path('images/brands'), 0777, true);
            }
            copy($path, public_path('images/brands/'.$filename));

            $data['logo'] = 'images/brands/'.$filename;
            $this->logo = $data['logo'];
            $this->new_logo = null;
        }

        $this->brand->update($data);
        $this->editMode = false;

        session()->flash('success', 'تم تحديث العلامة التجارية بنجاح.');
    }

    public function delete()
    {
        if ($this->brand->logo && file_exists(public_path($this->brand->logo))) {
            unlink(public_path($this->brand->logo));
        }

        $this->brand->delete();

        session()->flash('success', 'تم حذف العلامة التجارية بنجاح.');

        return redirect()->route('dashboard'); // Refresh
    }

    public function render()
    {
        return view('livewire.dashboard.brand-row');
    }
}
