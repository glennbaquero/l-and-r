<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'L&R Transport') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">

        @if (config('app.env') == 'production' || config('app.env') == 'staging')
            <!-- Styles -->
            <link rel="stylesheet" href="{{ asset(mix('css/app.css'), true) }}">
            <!-- Scripts -->
            <script src="{{ asset(mix('js/app.js'), true) }}" defer></script>
        @else
            <!-- Styles -->
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}" defer></script>
        @endif

        <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div id="app" class="min-h-screen bg-lightgray">

            <main >
                {{-- <div class="md:flex flex-col md:flex-row md:min-h-screen w-full"> --}}
                    @include('public.layouts.header')

                    {{ $slot }}

                    @include('public.layouts.footer')
                {{-- </div> --}}
            </main>

        </div> 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6r0SC_924b4vp9Qfq7NX9soQmiiNnh7Q&libraries=places,geometry"></script>
        {{-- <script src="https://unpkg.com/flatpickr@4.2.3/dist/plugins/rangePlugin.js"></script> --}}
        {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> --}}
    </body>
</html>
