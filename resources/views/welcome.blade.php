@extends('layouts.guest')

@section('content')
    <div id="app">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <section id="home">
            <div class="stars"></div>
            <div class="twinkling"></div>
            <div class="-mt-44">
                <img src="storage/img/saturn.png" alt="" class="w-80 -mb-12">
                <h2 class="text-5xl font-bold mb-5 overflow-hidden">Saturn Hosting</h2>
                <p class="text-gray-400 text-2xl mb-10 overflow-hidden">Launch Your Cloud Journey</p>
                <a href="/app"><button onclick="" class=" text-white bg-blue-500 bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"><p class="font-bold text-lg">Get Started ></p></button>
                </a>
            </div>
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