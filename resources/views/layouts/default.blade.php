<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Awesomebooks</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>


<body>

<div class="container">
    <header class="row">
        <div class="navbar">
            <div class="navbar-inner">
                <a id="logo" href="/">Aesomebooks</a>
                <ul class="nav">
                    <li><a href="/">Home</a></li>
                </ul>
            </div>
            <div class="input-group">
                <input type="search" value="" name="q" id="searchProduct" class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary searchProduct search-input" aria-label="Enter your Author, Title, ISBN" aria-describedby="searchProduct1" placeholder="Enter your Author, Title, ISBN" required="">
                <div class="input-group-append">

                    <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="submit" id="searchProduct1"> Search
                    </button>
                </div>
                <div id="result-ajax-search" class="result-ajax-search">
                    <ul class="search-results" style="max-height: 380px"></ul>
                </div>
            </div>

        </div>
    </header>

    <div id="main" class="row">

{{--        <livewire:search />--}}
        @yield('content')
    </div>

    <footer class="row">

    </footer>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@livewireScripts
</body>
</html>
