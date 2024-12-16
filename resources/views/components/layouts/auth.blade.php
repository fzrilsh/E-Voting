<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? config('app.name') }} | E-Voting Telkom University</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet"
        />

        @livewireStyles
        @if (env('APP_ENV') == 'production')
            <link rel="stylesheet" href="{{ asset('public/build/assets/app.css') }}">
        @else
            @vite('resources/css/app.css')
        @endif
    </head>
    <body>
        <header class="w-full flex items-center justify-center my-5">
            <img src="{{ asset('public/img/logo_univ_verti.png') }}" alt="Logo Telkom University" width="80" height="80" />
        </header>

        {{ $slot }}

        @livewireScripts
        <script src="{{ asset('public/build/assets/app2.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('public/vendor/livewire-alert/livewire-alert.js') }}"></script> 
        <x-livewire-alert::flash />
    </body>
</html>
