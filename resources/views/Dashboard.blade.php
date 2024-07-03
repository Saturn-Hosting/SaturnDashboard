@extends('layouts.app')

@section('content')
    <div class="dashboard">
        <h2>Dashboard</h2>
        <p>Welcome to {{ $_ENV['APP_NAME'] }}, {{ auth()->user()->name }}!</p>
        <a href="#" class="button">Create new project</a>
        <h3>Projects</h3>
        <div class="cards-grid">
            <?php for ($i = 0; $i < rand(0, 20); $i++) { ?>
                <!-- example project placeholder -->
                <div class="card">
                    <h3>Example project</h3>
                </div>
            <?php } ?>
        </div>
    </div>
@endsection