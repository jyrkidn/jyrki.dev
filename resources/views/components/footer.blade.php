<footer class="mx-auto mt-24 w-full max-w-7xl px-6 sm:mt-32 lg:mt-40 lg:px-8">
    <div class="mx-auto max-w-2xl lg:max-w-none">
        <div>
            <div class="mt-24 mb-20 flex flex-wrap items-end justify-between gap-x-6 gap-y-4 border-t border-primary/10 pt-12">
                <a aria-label="Home" href="{{ route('home') }}">
                    <x-logo />
                </a>
                <p class="text-sm text-primary">
                    &copy; Jyrki De Neve
                    {{ now()->year }}
                </p>
            </div>
        </div>
    </div>
</footer>
