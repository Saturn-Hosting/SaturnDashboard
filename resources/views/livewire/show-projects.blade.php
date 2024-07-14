<div>
    @foreach ($projects as $project)
        <div class="card p-6 border rounded-lg w-56 h-32 justify-center align-middle text-center flex items-center justify-center">
            <h3>{{ $project->name }}</h3>
        </div>
    @endforeach
</div>
