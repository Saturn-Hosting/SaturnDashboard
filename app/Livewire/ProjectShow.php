<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class ProjectShow extends Component
{
    public $project;
    public $console;
    public $consoleInput;

    public function mount()
    {
        $slug = request()->segment(2);
        $project = Project::where('slug', $slug)->first();
        if (!$project || $project->user_id != auth()->id()) {
            return abort(404);
        }
        $this->project = $project;
    }

    public function runCommand()
    {
        if (empty($this->consoleInput)) {
            return;
        }
        if (empty($this->console)) {
            $this->console = $this->project->executeInDocker($this->consoleInput);
        } else {
            $this->console = $this->console."\n".$this->project->executeInDocker($this->consoleInput);
        }
        $this->consoleInput = '';
    }

    public function render()
    {
        return view('livewire.project-show');
    }
}
