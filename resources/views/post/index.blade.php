<x-app-layout>
    @if ($searchQuery)
        <div class="flex flex-col mb-8 gap-y-2">
            <div>
                Searching for
                <span class="rounded-full py-1 px-2 bg-blue-900 text-gray-200 dark:bg-gray-200 dark:text-blue-900">
                    {{ $searchQuery }}
                </span>
            </div>
            <a
                class="underline"
                href="{{ route('post.index') }}"
            >
                View all posts
            </a>
        </div>
    @endif
    @foreach ($posts as $post)
        <article class="block mb-8">
            <h2 class="inline">
                <a
                    href="{{ $post->url }}"
                    class="text-xl font-bold mb-2"
                >
                    {{ $post->title }}
                </a>
            </h2>
            @if ($post->is_redirect)
                <span class="text-sm">
                    ({{ $post->redirect_url_host }})
                </span>
            @endif
            @if ($post->published_at)
                <time
                    datetime="{{ $post->published_at->format('Y-m-d') }}"
                >
                    - {{ $post->published_at->format('d-m-Y') }}
                </time>
            @endif
            <p>
                {{ $post->intro }}
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}
</x-app-layout>
