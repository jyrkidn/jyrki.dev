<div class="mt-24 rounded-4xl bg-purple-900 py-20 sm:mt-32 sm:py-32 lg:mt-56">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="flex items-center gap-x-8">
                <h2 class="font-display text-center text-xl font-semibold tracking-wider text-white sm:text-left">
                    {{ $title }}
                </h2>
                <div class="h-px flex-auto bg-purple-700"></div>
            </div>
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
