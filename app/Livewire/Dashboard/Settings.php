<?php

namespace App\Livewire\Dashboard;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $hero_title;

    public $hero_subtitle;

    public $hero_description;

    public $about_title;

    public $about_description_1;

    public $about_description_2;

    public $about_image; // Stores the path string

    public $new_about_image; // Stores the uploaded file

    public $contact_email;

    public $contact_address;

    public $contact_linkedin;

    public $contact_phone;

    public function mount()
    {
        $settings = Setting::all()->pluck('value', 'key');

        $this->hero_title = $settings['hero_title'] ?? '';
        $this->hero_subtitle = $settings['hero_subtitle'] ?? '';
        $this->hero_description = $settings['hero_description'] ?? '';
        $this->about_title = $settings['about_title'] ?? '';
        $this->about_description_1 = $settings['about_description_1'] ?? '';
        $this->about_description_2 = $settings['about_description_2'] ?? '';
        $this->about_image = $settings['about_image'] ?? '';
        $this->contact_email = $settings['contact_email'] ?? '';
        $this->contact_address = $settings['contact_address'] ?? '';
        $this->contact_linkedin = $settings['contact_linkedin'] ?? '';
        $this->contact_phone = $settings['contact_phone'] ?? '';
    }

    public function save()
    {
        $data = [
            'hero_title' => $this->hero_title,
            'hero_subtitle' => $this->hero_subtitle,
            'hero_description' => $this->hero_description,
            'about_title' => $this->about_title,
            'about_description_1' => $this->about_description_1,
            'about_description_2' => $this->about_description_2,
            'contact_email' => $this->contact_email,
            'contact_address' => $this->contact_address,
            'contact_linkedin' => $this->contact_linkedin,
            'contact_phone' => $this->contact_phone,
        ];

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        if ($this->new_about_image) {
            $filename = time().'_'.$this->new_about_image->getClientOriginalName();

            $path = $this->new_about_image->getRealPath();
            copy($path, public_path('images/'.$filename));

            Setting::updateOrCreate(
                ['key' => 'about_image'],
                ['value' => 'images/'.$filename]
            );
            $this->about_image = 'images/'.$filename;
            $this->new_about_image = null;
        }

        session()->flash('success', 'تم حفظ الإعدادات بنجاح.');
    }

    public function render()
    {
        return view('livewire.dashboard.settings');
    }
}
