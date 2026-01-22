<?php

namespace App\Livewire\Dashboard;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;

class Clients extends Component
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
            if (! file_exists(public_path('images/clients'))) {
                mkdir(public_path('images/clients'), 0777, true);
            }
            copy($path, public_path('images/clients/'.$filename));
            $validatedData['logo'] = 'images/clients/'.$filename;
        }

        Client::create($validatedData);

        $this->reset(['name', 'logo', 'order']);
        $this->order = 0;

        session()->flash('success', 'تم إضافة العميل بنجاح.');
    }

    public function render()
    {
        return view('livewire.dashboard.clients', [
            'clients' => Client::orderBy('order')->get(),
        ]);
    }
}
