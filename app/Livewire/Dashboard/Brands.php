<?php

namespace App\Livewire\Dashboard;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class Brands extends Component
{
    use WithFileUploads;

    public $name;

    public $logo;

    public $order = 0;

    protected $rules = [
        'name' => 'required|string|max:255',
        'logo' => 'required|image|max:2048',
        'order' => 'nullable|integer',
    ];

    public function store()
    {
        $validatedData = $this->validate();

        if ($this->logo) {
            $filename = time().'_'.$this->logo->getClientOriginalName();
            $path = $this->logo->getRealPath();
            if (! file_exists(public_path('images/brands'))) {
                mkdir(public_path('images/brands'), 0777, true);
            }
            copy($path, public_path('images/brands/'.$filename));
            $validatedData['logo'] = 'images/brands/'.$filename;
        }

        Brand::create($validatedData);

        $this->reset(['name', 'logo', 'order']);
        $this->order = 0;

        session()->flash('success', 'تم إضافة العلامة التجارية بنجاح.');
    }

    public function render()
    {
        return view('livewire.dashboard.brands', [
            'brands' => Brand::orderBy('order')->get(),
        ]);
    }
}
