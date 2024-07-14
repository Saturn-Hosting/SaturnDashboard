@extends('layouts.guest')

@section('content')
    <div id="app">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <section id="home">
            <h2>Home</h2>
        </section>
        <section id="about">
            <h2>About</h2>
        </section>
        <section id="contact">
            <h2>Contact</h2>
        </section>
        <section id="privacy">
            <h2>Privacy</h2>
        </section>
    </div>
@endsection