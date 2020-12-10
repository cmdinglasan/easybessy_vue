<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- App Icons-->

        <link rel="apple-touch-icon" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-60x60@2x.png') }}" />
        <link rel="apple-touch-icon" sizes="58x58" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-29x29@2x.png') }}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-76x76@1x.png') }}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-76x76@2x.png') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-60x60@3x.png') }}" />
        <link rel="shortcut icon" href="{{ asset('storage/appicon/favicon.ico') }}" type="image/x-icon">  

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

        <!-- Manifest -->
        <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

        <style>
        body {
            background-image: url({{asset('sprites/wb-background.svg')}});
        }
        </style>

    </head>
    <body class="antialiased bg-messy-blue" x-data="{ 'open': true }">
        <div class="relative flex items-top justify-center min-h-screen items-center sm:pt-0">
            <div class="relative">
                <div class="container">
                    <div class="front">
                        <div class="img logo mb-5">
                            <img src="{{ asset('sprites/appicon/ios/AppIcon.appiconset/Icon-App-29x29@2x.png') }}" alt="Messy Bessy POS logo" class="block mx-auto">
                        </div>
                    </div>
                    <div class="login">
                    @if (Route::has('login'))
                        <div class="bg-white bg-opacity-25 rounded-2xl h-18 flex justify-items-center">
                            @auth
                                <a href="{{ url('/dashboard') }}"  class="text-sm text-gray-700 p-5 bg-white flex-1 rounded-2xl -mr-1 font-bold px-10 cursor-pointer">Dashboard</a>
                                <form action="{{ route('logout') }}" method="POST" class="flex-1 py-5 px-10">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-sm text-gray-700 p-5 bg-white bg-opacity-0">Logout</a>
                                </form>
                            @else
                                <a @click="open = true" class="text-sm text-gray-700 p-5 bg-white flex-1 rounded-2xl -mr-1 font-bold px-10 cursor-pointer">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm text-gray-700 p-5  flex-1 bg-white bg-opacity-0 px-10">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>

        @if (Route::has('login'))
            @auth
        @else
        <div class="login-form fixed top-0 h-full w-full flex items-center transition" x-show="open" @keydown.escape="open = false" @click.away="open = false" :class="{ 'active' : open }"
        x-transition:enter="transition ease duration-800"
        x-transition:enter-start="transform translate-y-full" 
        x-transition:enter-end="transform translate-y-0"
        x-transition:leave="transition ease duration-800" 
        x-transition:leave-start="transform translate-y-0"
        x-transition:leave-end="transform translate-y-full">
            <div class="relative container mx-auto rounded-t-3xl bg-white w-screen md:w-32 mt-12 md:mt-0 h-screen sm:h-auto sm:rounded-3xl flex-1" style="max-width: 500px">
                @include('auth.login')
            </div>
        </div>
        @endauth
        @endif

    </body>
</html>
