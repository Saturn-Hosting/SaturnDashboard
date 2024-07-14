<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$_ENV['APP_NAME']}} - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/global.css'])

    <!-- scripts -->
    <script src="https://kit.fontawesome.com/837e657fcc.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="static flex">
        <nav>
            <h1>{{$_ENV['APP_NAME']}}</h1>
            <br>
            <ul>
            </ul>
        </nav>
    </header>
    <main>
        <div class="content">
            @yield('content')
        </div>
    </main>
</body>
</html>