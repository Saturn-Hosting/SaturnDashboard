<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$_ENV['APP_NAME']}} - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- scripts -->
    <script src="https://kit.fontawesome.com/837e657fcc.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <h1>{{$_ENV['APP_NAME']}}</h1>
            <ul>
                <div class="seperate"></div>
                <div class="seperate">
                    <a href="/app"><i class="fa-solid fa-house"></i></a>
                    <a href="/logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>