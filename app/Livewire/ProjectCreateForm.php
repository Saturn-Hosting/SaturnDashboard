<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Node;
use App\Models\Project;
use App\Models\Docker;

class ProjectCreateForm extends Component
{
    public $nodes;
    public $images;

    public $selectedNode;
    public $selectedName;
    public $selectedImage;

    public function mount()
    {
        $nodes = Node::all();
        $this->nodes = $nodes->filter(function ($node) {
            return $node->servers->count() > 0;
        });
        if (empty($this->nodes->first())) {
            throw new \Exception('No nodes available');
            return;
        }
        $this->selectedNode = $this->nodes->first()->id;
        $this->images = Docker::all();
        if (empty($this->images->first())) {
            throw new \Exception('No images available');
            return;
        }
        $this->selectedImage = $this->images->first()->id;
    }

    public function createProject()
    {
        if (empty($this->selectedName)) {
            return;
        }

        $image = Docker::find($this->selectedImage);
        if (empty($image)) {
            throw new \Exception('Image is required');
            return;
        }

        $node = Node::find($this->selectedNode);
        if (empty($node)) {
            throw new \Exception('Node is required');
            return;
        }

        $server = $node->findServer();
        if (empty($server)) {
            throw new \Exception('Server is required');
            return;
        }

        $project = new Project();
        $project->name = $this->selectedName;
        $project->user_id = auth()->id();
        $project->server_id = $server;
        $project->docker_id = $this->selectedImage;
        $project->save();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.project-create-form');
    }
}
