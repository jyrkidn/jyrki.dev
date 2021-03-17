<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta name="description" content="Hi, I'm a lead back-end developer at Code d'Or">
    <meta property="og:description" content="Hi, I'm a lead back-end developer at Code d'Or">
    <!-- <meta property="og:image" content="[http://example.com/social.jpg]" /> -->
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
</head>
<body class="dark:bg-blue-900 dark:text-gray-200 bg-gray-200 text-blue-900">
    <header>
        <nav class="flex items-center justify-between flex-wrap p-3 shadow">
            <div class="flex items-center flex-shrink-0 mr-3">
                <a href="/" class="font-semibold text-xl tracking-tight">
                    {{ config('app.name') }}
                </a>
            </div>
            <div class="flex-grow flex items-center w-auto">
                <div class="md:flex-grow">
                    @isset($menuItems)
                        @foreach ($menuItems as $menuItem)
                            <a href="{{ $menuItem->url }}" class="text-sm px-4 py-2 leading-none mt-0 @if(request()->url() === $menuItem->url) current @endif">
                                {{ $menuItem->title }}
                            </a>
                        @endforeach
                    @endisset
                </div>

                <div class="">
                    <form action="/search">
                        <label for="search-input" class="sr-only">
                            Search
                        </label>
                        <input
                            id="search-input"
                            class="dark:bg-blue-900 dark:text-gray-200 bg-gray-200 text-blue-900 focus:outline-none focus:shadow border dark:border-gray-200 border-blue-900 rounded py-1 px-2 block w-full appearance-none leading-none"
                            type="search"
                            name="q"
                            placeholder="Search"
                        >
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mx-auto px-5 lg:px-0 my-8 {{ isset($isCenter) ? 'flex justify-center' : '' }}">
        {{ $slot }}
    </div>
</body>
</html>