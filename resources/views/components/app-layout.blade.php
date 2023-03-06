<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @vite(['resources/js/app.js'])

    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta name="description" content="Hi, I'm a lead back-end developer at Code d'Or">
    <meta property="og:description" content="Hi, I'm a lead back-end developer at Code d'Or">
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
</head>
<body class="min-h-screen dark:bg-black dark:text-white bg-white text-black">
    <header
        class="pointer-events-none relative z-50 flex flex-col"
        style="height:var(--header-height);margin-bottom:var(--header-mb)"
    >
        <div class="top-0 z-10 h-16 pt-6" style="position:var(--header-position)">
            <div
                class="sm:px-8 top-[var(--header-top,theme(spacing.6))] w-full"
                style="position:var(--header-inner-position)"
            >
                <div class="mx-auto max-w-7xl lg:px-8">
                    <div class="relative px-4 sm:px-8 lg:px-12">
                        <div class="mx-auto max-w-2xl lg:max-w-5xl">
                            <div class="relative flex gap-4">
                                <div class="flex flex-1">
                                    <div class="p-0.5">
                                        <a
                                            aria-label="Home"
                                            href="/"
                                            class="text-purple-700 dark:text-purple-500 font-semibold text-4xl tracking-tight pointer-events-auto"
                                        >
                                            Jyrki<span class="lg:inline-block hidden pl-2">De Neve</span>
                                        </a>
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-1 justify-end md:justify-center">
                                <nav class="pointer-events-auto block">
                                    <x-menu :menu-items="$menuItems" />
                                </nav>
                            </div>
                            <div class="flex justify-end md:flex-1">
                                <div class="pointer-events-auto">
                                    <x-dark-mode />
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{--

                <a href="https://github.com/jyrkidn" class="">
                    <x-lineawesome-github class="w-8 h-8" />
                </a>
                <a href="https://twitter.com/jyrkidn" class="">
                    <x-lineawesome-twitter class="w-8 h-8" />
                </a>
            --}}
    <div class="sm:px-8 mt-8 md:mt-12">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="relative px-4 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-24">
        <div class="sm:px-8">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="border-t border-zinc-100 pt-10 pb-16 dark:border-zinc-700/40">
                    <div class="relative px-4 sm:px-8 lg:px-12">
                        <div class="mx-auto max-w-2xl lg:max-w-5xl">
                            <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
                                <div class="flex gap-6 text-sm font-medium text-zinc-800 dark:text-zinc-200">
                                    {{-- <a class="transition hover:text-teal-500 dark:hover:text-teal-400" href="/about">About</a>
                                    <a class="transition hover:text-teal-500 dark:hover:text-teal-400" href="/projects">Projects</a>
                                    <a class="transition hover:text-teal-500 dark:hover:text-teal-400" href="/speaking">Speaking</a>
                                    <a class="transition hover:text-teal-500 dark:hover:text-teal-400" href="/uses">Uses</a> --}}
                                </div>
                                <p class="text-sm flex items-center">
                                    <x-lineawesome-copyright-solid class="w-4 h-4 inline-block mr-1" />
                                    {{ now()->format('Y') }}
                                    Jyrki De Neve. All rights reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
