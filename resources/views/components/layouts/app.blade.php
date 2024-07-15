<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased flex flex-col h-screen w-screen bg-slate-950">
        <livewire:user-button />
        <div class="flex h-full w-full items-center justify-center">
            {{ $slot }}
        </div>

        @livewire('notifications')

        @filamentScripts
        @vite('resources/js/app.js')
        <x-script />
    </body>
</html>
