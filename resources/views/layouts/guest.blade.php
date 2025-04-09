@php use Illuminate\Support\Facades\Request;use Illuminate\Support\Facades\Route; @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans text-gray-900 antialiased flex flex-col">
<div class="flex flex-col lg:flex-row h-screen">
    <!-- Image section: hidden on small/medium screens, visible on large screens -->
    <div class="hidden lg:block lg:w-1/2">
        <img class="w-full rounded-2xl"
             src="@if(Request::route()->getName() === 'login')
                  {{ asset('images/homepage/Tablet login-rafiki.svg') }}
              @elseif(Request::route()->getName() === 'register')
                  {{ asset('images/homepage/Sign up-pana.svg') }}
              @elseif(Request::route()->getName() === 'password.reset')
                  {{ asset('images/homepage/Secure login-bro.svg') }}
              @elseif(Request::route()->getName() === 'password.request')
                  {{ asset('images/homepage/Forgot password-bro.svg') }}
              @endif"
             alt="Authentication Illustration">
    </div>

    <!-- Form section: always visible -->
    <div class="w-full lg:w-1/2 h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 dark:bg-gray-900">
        <div class="w-4/5 sm:max-w-xl mt-12 px-6 py-4 dark:bg-gray-800 shadow-md sm:rounded-lg">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>



</body>
</html>
