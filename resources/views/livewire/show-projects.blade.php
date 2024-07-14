<div class="grid grid-cols-4 gap-4 cards-grid">
    @foreach ($projects as $project)
        <div class="card p-6 border rounded-lg w-56 h-32 justify-center align-middle text-center flex items-center justify-center">
            <h3>{{ $project->name }}</h3>
        </div>
    @endforeach
    <a href="{{ route('projects.create') }}" class="card p-5 border rounded-lg w-36 justify-center align-middle text-center">
        <h3 class="text-2xl">+</h3>
    </a>
</div>
