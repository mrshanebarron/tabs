@php
    $variantConfig = config('ld-tabs.variants.' . $variant, config('ld-tabs.variants.default'));
@endphp

<div>
    {{-- Tab List --}}
    <div class="{{ $variantConfig['list'] }}" role="tablist">
        @foreach($tabs as $key => $label)
            <button
                wire:click="setActive('{{ $key }}')"
                class="{{ $active === $key ? $variantConfig['tab_active'] : $variantConfig['tab'] }}"
                role="tab"
                aria-selected="{{ $active === $key ? 'true' : 'false' }}"
                aria-controls="panel-{{ $key }}"
            >
                {{ $label }}
            </button>
        @endforeach
    </div>

    {{-- Tab Panels --}}
    <div class="{{ config('ld-tabs.panel') }}">
        {{ $slot }}
    </div>
</div>
