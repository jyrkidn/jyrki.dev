@props([
    'route' => null,
])
<a
    href="{{ route($route) }}"
    @class([
        'inline-flex text-xl font-semibold text-purple-900 transition hover:text-purple-700',
        'underline' => request()->routeIs($route),
    ])
>
    <span class="relative top-px">{{ $slot }}</span>
</a>
