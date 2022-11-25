{{-- <div class="space-x-4">
    @isset($menuItems)
        @foreach ($menuItems as $menuItem)
            <a
                href="{{ $menuItem->link }}"
                class="text-sm py-2 leading-none mt-0 hover:underline underline-offset-2 @if($menuItem->isActive()) font-bold @endif"
            >{{ $menuItem->title }}</a>
        @endforeach
    @endisset
</div> --}}

@isset($menuItems)
    <ul class="flex px-3 text-sm font-medium dark:text-white text-black">
        @foreach ($menuItems as $menuItem)
            <li>
                <a
                    href="{{ $menuItem->link }}"
                    @class([
                        'relative',
                        'block',
                        'px-3',
                        'py-2',
                        'transition',
                        'hover:text-purple-700 dark:hover:text-purple-500' => ! $menuItem->isActive(),
                        'text-purple-700 dark:text-purple-500' => $menuItem->isActive(),
                    ])
                >
                    {{ $menuItem->title }}
                    @if($menuItem->isActive())
                        <span
                            class="absolute inset-x-1 -bottom-px h-px bg-gradient-to-r from-purple-700/0 via-purple-700/40 to-purple-700/0 dark:from-purple-500/0 dark:via-purple-500/40 dark:to-teal-500/0"
                        >
                        </span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
@endisset
