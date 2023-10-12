<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Заметки') }}</title>

        <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 m-auto">
            {{ $slot }}
            <p class="mt-5 mb-3 text-body-secondary">© 2023</p>
        </main>
        <script src="{{ asset('bootstrap/js/bootstrap.js') }}"  ></script>
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>

</html>

