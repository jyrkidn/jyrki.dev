<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @vite

    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta name="description" content="Hi, I'm a lead back-end developer at Code d'Or">
    <meta property="og:description" content="Hi, I'm a lead back-end developer at Code d'Or">
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
</head>
<body class="min-h-screen dark:bg-black dark:text-white bg-white text-black">
    <header class="flex justify-between mx-10">
        <div class="flex items-center shrink-0 mr-3">
            <a href="/" class="text-purple-700 dark:text-purple-500 font-semibold text-4xl tracking-tight">
                {{ config('app.name') }}
            </a>
        </div>
        <!-- <x-search /> -->
        <div class="my-2 flex space-x-2 relative flex-col">
            <div class="flex justify-end space-x-4">
                <x-dark-mode />
                <a href="https://github.com/jyrkidn" class="">
                    <x-lineawesome-github class="w-8 h-8" />
                </a>
                <a href="https://twitter.com/jyrkidn" class="">
                    <x-lineawesome-twitter class="w-8 h-8" />
                </a>
            </div>
            <nav class="mx-10 flex justify-end">
                <x-menu :menu-items="$menuItems" />
            </nav>
        </div>
    </header>
    <div class="h-1 w-full bg-gradient-to-r from-purple-700 dark:from-purple-500 via-yellow-500 dark:via-yellow-500 to-purple-700 dark:to-purple-500"></div>
    <div class="container mx-auto px-5 my-8 {{ isset($isCenter) ? 'flex justify-center' : '' }}">
        {{ $slot }}
    </div>
</body>
</html>
