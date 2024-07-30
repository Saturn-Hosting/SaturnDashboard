@extends('layouts.guest')

@section('content')
<div id="app">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <section id="home" class="min-w-full">
        <div class="stars"></div>
        <div class="twinkling"></div>
            <div class="flex items-center justify-between w-full">
                <!-- Left side content -->
                <div class="flex flex-col items-center justify-center w-4/12 ml-32">
                    <h2 class="2xl:text-6xl lg:text-5xl font-extrabold mb-5 overflow-hidden" id="home-title">Saturn Hosting</h2>
                    <p class="text-gray-300 3xl:text-xl lg:text-lg overflow-hidden mb-6">Discover the power of cloud computing.</p>
                    <a href="/app">
                        <button onclick="" class="hover:bg-neutral-800 text-white bg-black border bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <p class="font-bold text-lg">Get Started ></p>
                        </button>
                    </a>
                </div>
                <!-- Right side content -->
                <div class="flex flex-col items-center justify-center w-8/12 ml-auto">
                    <img src="storage/img/saturn_big.png" alt="" class="w-3/4">
                </div>
        </div>
    </section>
    <section id="about">
        <h2>About</h2>
    </section>
    <section id="plans">
        <h2>Plans</h2>
    </section>
    <section id="contact">
        <h2>Contact</h2>
    </section>
</div>
@endsection
