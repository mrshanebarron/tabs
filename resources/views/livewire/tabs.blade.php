@php
    $variantConfig = config('sb-tabs.variants.' . $variant, config('sb-tabs.variants.default'));
@endphp

<div>
    {{-- Tab List --}}
    <div class="{{ $variantConfig['list'] }}" role="tablist">
        @foreach($tabs as $key => $tab)
            <button
                wire:click="setActive('{{ $key }}')"
                class="{{ $active === $key ? $variantConfig['tab_active'] : $variantConfig['tab'] }}"
                role="tab"
                aria-selected="{{ $active === $key ? 'true' : 'false' }}"
                aria-controls="panel-{{ $key }}"
            >
                {{ is_array($tab) ? $tab['label'] : $tab }}
            </button>
        @endforeach
    </div>

    {{-- Tab Panels --}}
    <div class="{{ config('sb-tabs.panel') }}">
        @foreach($tabs as $key => $tab)
            <div
                id="panel-{{ $key }}"
                role="tabpanel"
                class="{{ $active === $key ? '' : 'hidden' }}"
            >
                {!! is_array($tab) && isset($tab['content']) ? $tab['content'] : '' !!}
            </div>
        @endforeach
    </div>
</div>
