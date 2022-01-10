<div class="space-x-4">
    @isset($menuItems)
        @foreach ($menuItems as $menuItem)
            <a
                href="{{ $menuItem->link }}"
                class="text-sm py-2 leading-none mt-0 hover:underline underline-offset-2 @if($menuItem->isActive()) font-bold @endif"
            >{{ $menuItem->title }}</a>
        @endforeach
    @endisset
</div>
