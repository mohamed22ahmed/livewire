<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Awesomebooks</title>
    @livewireStyles
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="pb-5">
        <header class="row  align-items-center justify-content-center">
            <div class="navbar pt-3">
                <livewire:search />
            </div>
        </header>
    </div>

    <div id="main" class="container">
        @yield('content')
    </div>

    <footer class="row"></footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts
</body>
</html>
