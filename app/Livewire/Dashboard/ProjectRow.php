<?php

namespace App\Livewire\Dashboard;

use App\Models\Project;
use Livewire\Component;

class ProjectRow extends Component
{
    public Project $project;

    public $title;

    public $description;

    public $color;

    public $editMode = false;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->color = $project->color;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string',
        ]);

        $this->project->update([
            'title' => $this->title,
            'description' => $this->description,
            'color' => $this->color,
        ]);

        $this->editMode = false;

        session()->flash('success', 'تم تحديث المشروع بنجاح.');
    }

    public function delete()
    {
        $this->project->delete();

        session()->flash('success', 'تم حذف المشروع بنجاح.');

        return redirect()->route('dashboard'); // Refresh page
    }

    public function render()
    {
        return view('livewire.dashboard.project-row');
    }
}
