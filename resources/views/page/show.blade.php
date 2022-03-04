<x-app-layout>
    <article>
        <h2 class="text-xl font-bold mb-2">
            {{ $page->title }}
        </h2>

        <div class="mb-4 text-sm">
            {{ $page->read_time }}
        </div>

        {!! $page->content !!}
    </article>
</x-app-layout>
