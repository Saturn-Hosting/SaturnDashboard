@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen ">
        <p class="text-xl mb-4">Welcome to {{ $_ENV['APP_NAME'] }}, <b>{{ auth()->user()->name }}</b>!</p> 
        <br>
        <h3 class="text-4xl mb-4">Projects</h3> 
        <br>
        <div> 
            <livewire:show-projects />
        </div>
    </div>
@endsection
