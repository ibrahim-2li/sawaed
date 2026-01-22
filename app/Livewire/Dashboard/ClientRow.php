<?php

namespace App\Livewire\Dashboard;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientRow extends Component
{
    use WithFileUploads;

    public Client $client;

    public $name;

    public $logo; // current logo path

    public $new_logo; // new upload

    public $order;

    public $editMode = false;

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->name = $client->name;
        $this->logo = $client->logo;
        $this->order = $client->order;
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
            if ($this->client->logo && file_exists(public_path($this->client->logo))) {
                unlink(public_path($this->client->logo));
            }

            $filename = time().'_'.$this->new_logo->getClientOriginalName();
            $path = $this->new_logo->getRealPath();
            if (! file_exists(public_path('images/clients'))) {
                mkdir(public_path('images/clients'), 0777, true);
            }
            copy($path, public_path('images/clients/'.$filename));

            $data['logo'] = 'images/clients/'.$filename;
            $this->logo = $data['logo'];
            $this->new_logo = null;
        }

        $this->client->update($data);
        $this->editMode = false;

        session()->flash('success', 'تم تحديث العميل بنجاح.');
    }

    public function delete()
    {
        if ($this->client->logo && file_exists(public_path($this->client->logo))) {
            unlink(public_path($this->client->logo));
        }

        $this->client->delete();

        session()->flash('success', 'تم حذف العميل بنجاح.');

        return redirect()->route('dashboard'); // Refresh
    }

    public function render()
    {
        return view('livewire.dashboard.client-row');
    }
}
