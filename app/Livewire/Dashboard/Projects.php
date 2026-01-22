<?php

namespace App\Livewire\Dashboard;

use App\Models\Project;
use Livewire\Component;

class Projects extends Component
{
    public $title;

    public $description;

    public $color = 'primary';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'color' => 'required|string',
    ];

    public function store()
    {
        $validatedData = $this->validate();

        Project::create($validatedData);

        $this->reset(['title', 'description', 'color']);
        $this->color = 'primary';

        session()->flash('success', 'تم إضافة المشروع بنجاح.');
    }

    public function render()
    {
        return view('livewire.dashboard.projects', [
            'projects' => Project::all(),
        ]);
    }
}
