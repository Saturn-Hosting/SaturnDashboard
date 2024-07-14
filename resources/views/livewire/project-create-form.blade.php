<div>
    <section>
    <h2>Create new project</h2>
    <input type="text" wire:model="selectedName" placeholder="Project name" />
    <select wire:model="selectedNode">
        @foreach ($nodes as $node)
            <option value="{{ $node->id }}">{{ $node->location }}</option>
        @endforeach
    </select>
    <button wire:click="createProject">Create project</button>
    </section>
</div>
