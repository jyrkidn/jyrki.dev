<div class="flex">
    <article class="relative flex w-full flex-col rounded-3xl p-6 ring-1 ring-purple-600/5 transition hover:bg-neutral-50 sm:p-8">
        <h3>
            <a href="/work/family-fund">
                <span class="absolute inset-0 rounded-3xl"></span>
            </a>
        </h3>
        <p class="mt-6 flex gap-x-2 text-sm text-primary">
            <time datetime="{{ now() }}" class="font-semibold">
                {{ fake()->dateTime()->format('d/m/Y') }}
            </time>
            <span class="text-neutral-300" aria-hidden="true">-</span>
            <span>{{ fake()->word() }}</span>
        </p>
        <p class="font-display mt-6 text-2xl font-semibold text-primary">
            {{ fake()->sentence() }}
        </p>
        <p class="mt-4 text-base text-primary">
            {{ fake()->paragraph() }}
        </p>
    </article>
</div>
