<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$_ENV['APP_NAME']}}</title>
    @vite(['resources/css/guest.css', 'resources/js/guest.js'])
</head>
<body>
    <header>
        <nav>
            <ul>
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="/privacy">Privacy</a>
                <a href="/contact">Contact</a>
                <a href="/app">App</a>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p class="trademark">&copy; {{date('Y')}} {{$_ENV['APP_NAME']}}</p>
    </footer>
</body>
</html>