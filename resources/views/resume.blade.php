<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resume</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                    <ul role="list" class="mt-4 flex justify-center gap-10 text-base font-medium leading-7 text-zinc-700 sm:gap-8 lg:flex-col lg:gap-4">
                        <li class="flex">
                            <a class="group flex items-center" aria-label="E-mail" href="mailto:me@jyrki.dev">
                                <x-lineawesome-mail-bulk-solid class="h-8 w-8 fill-zinc-400" />
                                <span class="hidden sm:ml-3 sm:block">me@jyrki.dev</span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="group flex items-center" aria-label="Twitter" href="https://twitter.com/jyrkidn">
                                <x-lineawesome-twitter class="h-8 w-8 fill-zinc-400" />
                                <span class="hidden sm:ml-3 sm:block">@jyrkidn</span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="group flex items-center" aria-label="LinkedIn" href="https://www.linkedin.com/in/jyrki-de-neve">
                                <x-lineawesome-linkedin-in class="h-8 w-8 fill-zinc-400" />
                                <span class="hidden sm:ml-3 sm:block">jyrki-de-neve</span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="group flex items-center" aria-label="LinkedIn" href="https://jyrki.dev">
                                <x-lineawesome-globe-solid class="h-8 w-8 fill-zinc-400" />
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
                                                As lead back-end developer I was responsible for choosing our tools (e.g. we switched from Gitlab to Github). Also we switched from CakePHP (custom cms) to Laravel (first Nova and now Filament), introduced Vue.js. Wrote down our <a href="https://guidelines.codedor.be/">guidelines</a>, helped interviewing applicants, put out roadmaps for each year, followed up the performance reviews for each back-end developer, made together with the other back-end developers around 60 private Laravel packages (that were too specific to open source).
                                                For client projects I made REST API’s, talked with external services (SOAP/REST/Payment providers)
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
                                <h1 class="text-2xl font-bold leading-7 text-zinc-900">Skills</h1>
                            </div>
                        </div>
                    </div>
                    <div class="divide-y divide-zinc-100 sm:mt-4 lg:mt-8 lg:border-t lg:border-zinc-100">
                        <article aria-labelledby="codedor-title" class="py-10 sm:py-12">
                            <div class="lg:px-8">
                                <div class="lg:max-w-4xl">
                                    <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Laravel >6</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">CakePHP 2</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">PestPHP</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">PHPUnit</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Cypress</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Jest</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Javascript</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Vue</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Bootstrap</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Tailwind</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">MySQL</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">MeiliSearch</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Algolia</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Docker</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Git</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Linux</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">REST</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Jira/Confluence</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Office 365</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Asana</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">TablePlus</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">VS Code</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Gitlab</span>
                                        <span class="bg-purple-700 px-3 py-1 rounded-full">Github</span>
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