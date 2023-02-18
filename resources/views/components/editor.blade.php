<div
    x-data="setupEditor(
        $wire.entangle('{{ $attributes->wire('model')->value() }}').defer
    )"
    x-init="() => init($refs.editor)"
    wire:ignore
    {{ $attributes->whereDoesntStartWith('wire:model') }}
    class="h-16 w-full"
>
    <div x-ref="editor"></div>
</div>
