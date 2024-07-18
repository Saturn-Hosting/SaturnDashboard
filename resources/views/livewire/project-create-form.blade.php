<div>
    <section>
    <h2>Create new project</h2>
    <input type="text" wire:model="selectedName" placeholder="Project name" style="color: black;"/>
    <select wire:model="selectedNode" style="color: black;">
        @foreach ($nodes as $node)
            <option value="{{ $node->id }}">{{ $node->location }}</option>
        @endforeach
    </select>
    <select wire:model="selectedImage" style="color: black;">
        @foreach ($images as $image)
            <option value="{{ $image->id }}">{{ $image->name }}</option>
        @endforeach
    </select>
    <button wire:click="createProject">Create project</button>
    </section>
</div>
