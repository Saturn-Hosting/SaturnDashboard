<div>
    @foreach ($projects as $project)
        <div class="card p-5 border-neutral-700 border rounded-lg justify-center align-middle text-center w-36">
            <h3>{{ $project->name }}</h3>
        </div>
    @endforeach
</div>
