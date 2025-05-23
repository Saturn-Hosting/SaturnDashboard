<div class="dashboard-container" style="display: flex;">
    <div>
        <div class="dashboard-header">
            <h1>{{ $project->name }}</h1>
        </div>
        <div class="dashboard-content" style="margin-top: 100px;">
            <div class="dashboard-item">
                <h2>Location</h2>
                <p>{{ $project->node()->location }}</p>
            </div>
            <div class="dashboard-item">
                <h2>Created</h2>
                <p>{{ $project->created_at->diffForHumans() }}</p>
            </div>
            <div class="dashboard-item">
                <h2>Image</h2>
                <p>{{ $project->docker->name }}</p>
            </div>
        </div>
    </div>
    <div class="console" style="margin-top:100px; color: black;">
        <div class="console-output">
            @if (empty($console))
                <p>No console output found.</p>
            @else
                <p>{!! nl2br($console) !!}</p>
            @endif
        </div>
        <input type="text" wire:model="consoleInput" wire:keydown.enter="runCommand" class="console-input" placeholder="Type a command">
    </div>
</div>
