<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resume</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div>
        <header class="bg-zinc-50 lg:fixed lg:inset-y-0 lg:left-0 lg:flex lg:w-112 lg:items-start lg:overflow-y-auto xl:w-120">
            <div class="relative z-10 mx-auto px-4 pb-4 pt-10 sm:px-6 md:max-w-2xl md:px-4 lg:min-h-full lg:flex-auto lg:border-x lg:border-zinc-200 lg:py-12 lg:px-8 xl:px-12">
                <a class="relative mx-auto block w-48 overflow-hidden rounded-lg bg-zinc-200 shadow-xl shadow-zinc-200 sm:w-64 sm:rounded-xl lg:w-auto lg:rounded-2xl" aria-label="Homepage" href="/">
                    <img alt="" src="/images/me.jpeg" width="200" height="200" class="w-full" style="color:transparent">
                    <div class="absolute inset-0 rounded-lg ring-1 ring-inset ring-black/10 sm:rounded-xl lg:rounded-2xl"></div>
                </a>
                <div class="mt-10 text-center lg:mt-12 lg:text-left">
                    <p class="text-xl font-bold text-zinc-900">Jyrki De Neve</p>
                    <p class="mt-3 text-lg font-medium leading-8 text-zinc-700">Back-end Developer</p>
                </div>
                <section class="mt-12">
                    <h2 class="items-center font-mono text-sm font-medium leading-7 text-zinc-900 hidden lg:flex">
                        <x-lineawesome-address-card-solid class="h-5 w-5" />
                        <span class="ml-5">About</span>
                    </h2>
                    <p class="mt-2 text-base leading-7 text-zinc-700 lg:line-clamp-4">
                        I'm a back-end developer based in Suntaži Parish, Ogre Municipality, Latvia with 10 years of experience in web development.
                    </p>
                </section>
                <section class="mt-10 lg:mt-12">
                    <h2 class="sr-only flex items-center font-mono text-sm font-medium leading-7 text-zinc-900 lg:not-sr-only">
                        <x-lineawesome-id-badge-solid class="h-5 w-5" />
                        <span class="ml-2.5">Contact</span>
                    </h2>
                    <div class="h-px bg-gradient-to-r from-zinc-200/0 via-zinc-200 to-zinc-200/0 lg:hidden"></div>
                    <ul role="list" class="mt-4 flex justify-center gap-10 text-sm font-medium leading-7 text-zinc-700 sm:gap-8 lg:flex-col lg:gap-4">
                        <li class="flex">
                            <a class="group flex items-center" aria-label="E-mail" href="mailto:me@jyrki.dev">
                                <x-lineawesome-mail-bulk-solid class="h-5 w-5 fill-zinc-400" />
                                <span class="hidden sm:ml-3 sm:block">me@jyrki.dev</span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="group flex items-center" aria-label="Twitter" href="https://twitter.com/jyrkidn">
                                <x-lineawesome-twitter class="h-5 w-5 fill-zinc-400" />
                                <span class="hidden sm:ml-3 sm:block">@jyrkidn</span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="group flex items-center" aria-label="LinkedIn" href="https://www.linkedin.com/in/jyrki-de-neve">
                                <x-lineawesome-linkedin-in class="h-5 w-5 fill-zinc-400" />
                                <span class="hidden sm:ml-3 sm:block">jyrki-de-neve</span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="group flex items-center" aria-label="LinkedIn" href="https://jyrki.dev">
                                <x-lineawesome-globe-solid class="h-5 w-5 fill-zinc-400" />
                                <span class="hidden sm:ml-3 sm:block">jyrki.dev</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
        </header>
        <main class="border-t border-zinc-200 lg:relative lg:mb-28 lg:ml-112 lg:border-t-0 xl:ml-120">
            <div class="relative">
                <div class="pt-16 pb-12 sm:pb-4 lg:pt-12">
                    <div class="lg:px-8">
                        <div class="lg:max-w-4xl">
                            <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                <h1 class="text-2xl font-bold leading-7 text-zinc-900">Work Experience</h1>
                            </div>
                        </div>
                    </div>
                    <div class="divide-y divide-zinc-100 sm:mt-4 lg:mt-8 lg:border-t lg:border-zinc-100">
                        <article aria-labelledby="codedor-title" class="py-10 sm:py-12">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <div class="flex flex-col items-start">
                                            <h2 id="codedor-title" class="mt-2 text-lg font-bold text-zinc-900">
                                                <a href="https://codedor.be" target="blank">Lead Back-end Developer @ Code d'Or, Ghent, Belgium</a>
                                            </h2>
                                            <span class="order-first font-mono text-sm leading-7 text-zinc-500">
                                                November 2012 - current
                                            </span>
                                            <p class="mt-1 text-base leading-7 text-zinc-700">
                                                Started as my first job and in the first four years, I grew to being the lead back-end developer.
                                            </p>
                                            <ul class="ml-4 list-disc text-base leading-7 text-zinc-500">
                                                <li>Choosing tools we use (Github, Sentry, ...)</li>
                                                <li>Organized migration from CakePHP to Laravel</li>
                                                <li>Introduced Vue.js</li>
                                                <li>Documented our <a href="https://guidelines.codedor.be/">guidelines</a></li>
                                                <li>Interviewing applicants</li>
                                                <li>Made and executed yearly roadmaps</li>
                                                <li>Leading performance reviews</li>
                                                <li>Maintaining around 60 internal Laravel packages</li>
                                                <li>Coding for clients (REST API, integration with external services etc.)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="pt-16 pb-12 sm:pb-4 lg:pt-12">
                    <div class="lg:px-8">
                        <div class="lg:max-w-4xl">
                            <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                <h1 class="text-2xl font-bold leading-7 text-zinc-900">Skills</h1>
                            </div>
                        </div>
                    </div>
                    <div class="divide-y divide-zinc-100 sm:mt-4 lg:mt-8 lg:border-t lg:border-zinc-100">
                        <article aria-labelledby="codedor-title" class="py-10 sm:py-12">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <div class="mb-4">
                                            <span class="text-sm leading-7 text-zinc-500">PHP (Laravel)</span>
                                            <div class="flex flex-auto rounded-full bg-zinc-200">
                                                <div class="h-2 w-11/12 flex-none rounded-l-full rounded-r-[1px] bg-purple-700"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <span class="text-sm leading-7 text-zinc-500">Testing (PestPHP & PHPUnit)</span>
                                            <div class="flex flex-auto rounded-full bg-zinc-200">
                                                <div class="h-2 w-11/12 flex-none rounded-l-full rounded-r-[1px] bg-purple-700"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <span class="text-sm leading-7 text-zinc-500">Javascript</span>
                                            <div class="flex flex-auto rounded-full bg-zinc-200">
                                                <div class="h-2 w-9/12 flex-none rounded-l-full rounded-r-[1px] bg-purple-700"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <span class="text-sm leading-7 text-zinc-500">Vue</span>
                                            <div class="flex flex-auto rounded-full bg-zinc-200">
                                                <div class="h-2 w-8/12 flex-none rounded-l-full rounded-r-[1px] bg-purple-700"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <span class="text-sm leading-7 text-zinc-500">CSS</span>
                                            <div class="flex flex-auto rounded-full bg-zinc-200">
                                                <div class="h-2 w-8/12 flex-none rounded-l-full rounded-r-[1px] bg-purple-700"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <span class="text-sm leading-7 text-zinc-500">MySQL</span>
                                            <div class="flex flex-auto rounded-full bg-zinc-200">
                                                <div class="h-2 w-10/12 flex-none rounded-l-full rounded-r-[1px] bg-purple-700"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <span class="text-sm leading-7 text-zinc-500">Docker</span>
                                            <div class="flex flex-auto rounded-full bg-zinc-200">
                                                <div class="h-2 w-3/12 flex-none rounded-l-full rounded-r-[1px] bg-purple-700"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <span class="text-sm leading-7 text-zinc-500">Git</span>
                                            <div class="flex flex-auto rounded-full bg-zinc-200">
                                                <div class="h-2 w-10/12 flex-none rounded-l-full rounded-r-[1px] bg-purple-700"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article aria-labelledby="codedor-title" class="py-10 sm:py-12">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0 text-zinc-500 flex flex-wrap gap-4">
                                        <span class="">MeiliSearch</span>
                                        <span class="">Algolia</span>
                                        <span class="">Docker</span>
                                        <span class="">Git</span>
                                        <span class="">Linux</span>
                                        <span class="">REST</span>
                                        <span class="">Jira/Confluence</span>
                                        <span class="">Office 365</span>
                                        <span class="">Asana</span>
                                        <span class="">TablePlus</span>
                                        <span class="">VS Code</span>
                                        <span class="">Gitlab</span>
                                        <span class="">Github</span>
                                        <span class="">Debugging</span>
                                        <span class="">Communication</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="pt-16 pb-12 sm:pb-4 lg:pt-12">
                    <div class="lg:px-8">
                        <div class="lg:max-w-4xl">
                            <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                <h1 class="text-2xl font-bold leading-7 text-zinc-900">Languages</h1>
                            </div>
                        </div>
                    </div>
                    <div class="sm:mt-4 lg:mt-8 lg:border-t lg:border-zinc-100">
                        <article aria-labelledby="codedor-title" class="py-2">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <div class="flex flex-col items-start">
                                            <h2 id="codedor-title" class="mt-2 text-lg font-bold text-zinc-900">
                                                Dutch
                                            </h2>
                                            <p class="mt-1 text-base leading-7 text-zinc-700">
                                                My mothertongue
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article aria-labelledby="codedor-title" class="py-2">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <div class="flex flex-col items-start">
                                            <h2 id="codedor-title" class="mt-2 text-lg font-bold text-zinc-900">
                                                English
                                            </h2>
                                            <p class="mt-1 text-base leading-7 text-zinc-700">
                                                Advanced speaker and writer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article aria-labelledby="codedor-title" class="py-2">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <div class="flex flex-col items-start">
                                            <h2 id="codedor-title" class="mt-2 text-lg font-bold text-zinc-900">
                                                French
                                            </h2>
                                            <p class="mt-1 text-base leading-7 text-zinc-700">
                                                Basic speaker
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article aria-labelledby="codedor-title" class="py-2">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <div class="flex flex-col items-start">
                                            <h2 id="codedor-title" class="mt-2 text-lg font-bold text-zinc-900">
                                                Latvian
                                            </h2>
                                            <p class="mt-1 text-base leading-7 text-zinc-700">
                                                Very basic
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="pt-16 pb-12 sm:pb-4 lg:pt-12">
                    <div class="lg:px-8">
                        <div class="lg:max-w-4xl">
                            <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                <h1 class="text-2xl font-bold leading-7 text-zinc-900">Education</h1>
                            </div>
                        </div>
                    </div>
                    <div class="divide-y divide-zinc-100 sm:mt-4 lg:mt-8 lg:border-t lg:border-zinc-100">
                        <article aria-labelledby="codedor-title" class="py-10 sm:py-12">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <div class="flex flex-col items-start">
                                            <h2 id="codedor-title" class="mt-2 text-lg font-bold text-zinc-900">
                                                Postgraduate in IT-management @ HOGENT, Ghent, Belgium
                                            </h2>
                                            <span class="order-first font-mono text-sm leading-7 text-zinc-500">
                                                2010-2012
                                            </span>
                                            <p class="mt-1 text-base leading-7 text-zinc-700">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article aria-labelledby="codedor-title" class="py-10 sm:py-12">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <div class="flex flex-col items-start">
                                            <h2 id="codedor-title" class="mt-2 text-lg font-bold text-zinc-900">
                                                Professional bachelor in Applied Information Technology @ HOGENT, Ghent, Belgium
                                            </h2>
                                            <span class="order-first font-mono text-sm leading-7 text-zinc-500">
                                                2006-2010
                                            </span>
                                            <p class="mt-1 text-base leading-7 text-zinc-700">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </main>
        <div class="fixed inset-x-0 bottom-0 z-10 lg:left-112 xl:left-120"></div>
    </div>
</body>
</html>
