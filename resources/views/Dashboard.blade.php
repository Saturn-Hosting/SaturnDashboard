@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen ">
        <h2 class="text-3xl">Dashboard</h2>
        <p>Welcome to {{ $_ENV['APP_NAME'] }}, <b>{{ auth()->user()->name }}</b>!</p>
        <br>
        <h3 class="text-2xl">Projects</h3>
        <br>
        <div>
            <livewire:show-projects />
        </div>
    </div>
@endsection