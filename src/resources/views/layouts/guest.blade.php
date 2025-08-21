<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Application</title>

        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="main-content-wrapper">
            {{ $slot }}
        </div>
        
        @livewireScripts
    </body>
</html>