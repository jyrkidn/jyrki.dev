<x-app-layout>
    <article class="block mb-8">
        <h2 class="inline">
            <a
                href="{{ $post->url }}"
                class="text-xl font-bold mb-2"
            >
                {{ $post->title }}
            </a>
        </h2>
        <time
            datetime="{{ $post->published_at->format('Y-m-d') }}"
        >
            {{ $post->published_at }}
        </time>

        <p>
            {{ $post->intro }}
        </p>
    </article>
</x-app-layout>