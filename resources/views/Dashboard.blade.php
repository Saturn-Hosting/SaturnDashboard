@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen ">
        <h2 class="text-3xl">Dashboard</h2>
        <p>Welcome to {{ $_ENV['APP_NAME'] }}, <b>{{ auth()->user()->name }}</b>!</p>
        <br>
        <h3 class="text-2xl">Projects</h3>
        <br>
        <div class="grid grid-cols-4 gap-4 cards-grid">
            <?php for ($i = 0; $i < rand(3, 20); $i++) { ?>
                <!-- example project placeholder -->
                <div class="card p-5 border-neutral-700 border rounded-lg justify-center align-middle text-center w-37">
                    <h3>Example Project</h3>
                </div>
            <?php } ?>
            <a href="{{ route('projects.create') }}" class="card p-5 border rounded-lg w-36 justify-center align-middle text-center">
                <h3 class="text-2xl">+</h3>
            </a>
        </div>
    </div>
@endsection