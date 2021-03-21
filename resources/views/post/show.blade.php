<x-app-layout>
    <article class="">
        <h2 class="">
            <a
                href="{{ $post->url }}"
                class="text-xl font-bold mb-2"
            >
                {{ $post->title }}
            </a>
        </h2>

        <div class="mb-4 text-sm">
            <time
                datetime="{{ $post->published_at->format('Y-m-d') }}"
            >
                @if ($post->published_at)
                    <time
                        datetime="{{ $post->published_at->format('Y-m-d') }}"
                    >
                        {{ $post->published_at->format('jS \o\f F, Y') }}
                    </time>
                @endif
            </time>
            |
            {{ $post->read_time }}
        </div>

        <div class="italic mb-8">
            {{ $post->intro }}
        </div>

        {!! $post->content !!}
    </article>
</x-app-layout>