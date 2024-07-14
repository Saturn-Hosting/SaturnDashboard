@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen ">
        <p class="text-xl mb-4">Welcome to {{ $_ENV['APP_NAME'] }}, <b>{{ auth()->user()->name }}</b>!</p> 
        <br>
        <h3 class="text-4xl mb-4">Projects</h3> 
        <br>
        <div class="grid grid-cols-4 gap-6 cards-grid"> 
            <livewire:show-projects />
            <a href="{{ route('projects.create') }}" class="card p-6 border rounded-lg w-56 h-32 justify-center align-middle text-center flex items-center justify-center">
                <h3 class="text-3xl">+</h3> <!-- Increased from text-2xl -->
            </a>            
        </div>
    </div>
@endsection
