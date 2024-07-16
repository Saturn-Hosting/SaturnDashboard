<div class="grid grid-cols-4 gap-4 cards-grid">
    @foreach ($projects as $project)
        <a href="/projects/{{$project->slug}}/show">
            <div class="card p-6 border rounded-lg w-56 h-32 justify-center align-middle text-center flex items-center justify-center">
                <h3>{{ $project->name }}</h3>
            </div>
        </a>
    @endforeach
    <a href="{{ route('projects.create') }}" class="card p-6 border rounded-lg w-56 h-32 justify-center align-middle text-center flex items-center justify-center">
        <h3 class="text-3xl">+</h3>
    </a>
</div>
