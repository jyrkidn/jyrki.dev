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
    <div class="mx-auto grid max-w-xl grid-cols-1 gap-y-20 lg:max-w-none lg:grid-cols-1">
        <div class="flex flex-col gap-8">
            @foreach ($posts as $post)
                <article
                    class="group relative flex flex-col items-start"
                >
                    <h2 class="text-base font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">
                        <div class="absolute -inset-y-2.5 -inset-x-4 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-zinc-800/50 sm:-inset-x-6 sm:rounded-2xl">
                        </div>
                        <a
                            href="{{ $post->url }}"
                            @if($post->is_redirect) target="_blank" @endif
                        >
                            <span class="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                            <span class="relative z-10">{{ $post->title }}</span>
                        </a>
                    </h2>
                    <div class="relative z-10 order-first mb-2 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5">
                        @if ($post->published_at)
                            <time datetime="{{ $post->published_at->format('Y-m-d') }}">
                                <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
                                    <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
                                </span>
                                {{ $post->published_at->format('d-m-Y') }}
                            </time>
                        @endif
                        @if ($post->is_redirect)
                            @if ($post->published_at)
                                <span class="px-1">
                                    <x-lineawesome-minus-solid class="w-4 h-8" />
                                </span>
                            @endif
                            {{ $post->redirect_url_host }}
                        @endif
                    </div>
                    <p class="relative z-10 mt-2 text-sm">
                        {{ $post->intro }}
                    </p>
                    <div aria-hidden="true" class="relative z-10 mt-3 flex items-center text-sm font-medium text-purple-700 dark:text-purple-500">
                        Read article
                        <x-lineawesome-greater-than-solid class="ml-1 h-3 w-3 stroke-current" />
                    </div>
                </article>
            @endforeach
        </div>
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</x-app-layout>
