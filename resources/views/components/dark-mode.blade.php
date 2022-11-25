<div
    x-data="{
        toDarkMode () {
            localStorage.theme = 'dark';
            this.updateTheme();
        },
        toLightMode () {
            localStorage.theme = 'light';
            this.updateTheme();
        },
        toSystemMode () {
            localStorage.theme = 'system';
            this.updateTheme();
        },
        updateTheme () {
            if (!('theme' in localStorage)) {
                localStorage.theme = 'system';
            }
            switch (localStorage.theme) {
                case 'system':
                    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                    document.documentElement.setAttribute('color-theme', 'system');
                    break;
                case 'dark':
                    document.documentElement.classList.add('dark');
                    document.documentElement.setAttribute('color-theme', 'dark');
                    break;
                case 'light':
                    document.documentElement.classList.remove('dark');
                    document.documentElement.setAttribute('color-theme', 'light');
                    break;
            }
            this.open = false;
        },
        open: false
    }"
    x-init="updateTheme()"
    class=""
>
    <div
        class="relative flex items-center space-x-1 cursor-pointer text-sm font-medium"
        @click="open = !open"
        @click.outside="open = false"
    >
        <label class="sr-only">Theme</label>
        <x-lineawesome-sun-solid class="w-8 h-8 block dark:hidden" />
        <x-lineawesome-moon-solid class="w-8 h-8 hidden dark:block"/>
    </div>
    <ul
        class="absolute z-50 top-full right-0 bg-white rounded-lg ring-1 ring-gray-900/10 shadow-lg overflow-hidden w-24 py-1 text-sm text-gray-700 font-semibold dark:bg-gray-800 dark:ring-0 dark:highlight-white/5 dark:text-gray-300"
        aria-orientation="vertical"
        role="listbox"
        tabindex="0"
        x-show="open"
        x-cloak
    >
        <li @click="toLightMode()" class="py-1 px-2 flex items-center cursor-pointer" role="option" tabindex="-1" aria-selected="true">
            <x-lineawesome-sun-solid class="w-6 h-6 inline mr-2"/>Light
        </li>
        <li @click="toDarkMode()" class="py-1 px-2 flex items-center cursor-pointer" role="option" tabindex="-1">
            <x-lineawesome-moon-solid class="w-6 h-6 inline mr-2"/>Dark
        </li>
        <li @click="toSystemMode()" class="py-1 px-2 flex items-center cursor-pointer" role="option" tabindex="-1">
            <x-lineawesome-desktop-solid class="w-6 h-6 inline mr-2"/> System
        </li>
    </ul>
</div>
