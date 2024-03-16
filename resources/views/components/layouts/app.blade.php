<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Marriage Collection System</title>
    <style>
        .error {
            color: red;
        }
    </style>
    @livewireStyles
</head>
    <body>
        {{ $slot }}
        @livewireScripts
    </body>
</html>
