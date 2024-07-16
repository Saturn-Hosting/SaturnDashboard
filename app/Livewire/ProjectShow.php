<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class ProjectShow extends Component
{
    public $project;
    public $console = "No console output found.";
    public $consoleInput;

    public function mount()
    {
        $slug = request()->segment(2);
        $project = Project::where('slug', $slug)->first();
        if (!$project) {
            return abort(404);
        }
        $this->project = $project;
    }

    public function runCommand()
    {
        if (empty($this->consoleInput)) {
            return;
        }
        $this->console = $this->project->server->executeCommand($this->consoleInput);
        $this->consoleInput = '';
    }

    public function render()
    {
        return view('livewire.project-show');
    }
}
