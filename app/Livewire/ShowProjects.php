<?php

namespace App\Livewire;

use Livewire\Component;

class ShowProjects extends Component
{
    public $projects = [];

    public function mount()
    {
        $this->projects = auth()->user()->projects;
    }

    public function render()
    {
        return view('livewire.show-projects');
    }
}
