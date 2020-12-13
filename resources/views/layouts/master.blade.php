<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/spectre.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/spectre-exp.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/spectre-icons.min.css') }}">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles

    </head>
    <body>
        @livewire('head')

        <div class="container">

            @yield('content')
        </div>
        @livewireScripts
    </body>
</html>
