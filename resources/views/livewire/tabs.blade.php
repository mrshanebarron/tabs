@php
    $variants = [
        'default' => [
            'list' => 'display: flex; border-bottom: 1px solid #e5e7eb;',
            'tab' => 'padding: 8px 16px; font-size: 14px; font-weight: 500; color: #6b7280; border-bottom: 2px solid transparent; margin-bottom: -1px; cursor: pointer; background: none; border-top: none; border-left: none; border-right: none; transition: color 0.15s;',
            'tab_active' => 'padding: 8px 16px; font-size: 14px; font-weight: 500; color: #2563eb; border-bottom: 2px solid #2563eb; margin-bottom: -1px; cursor: pointer; background: none; border-top: none; border-left: none; border-right: none;',
        ],
        'pills' => [
            'list' => 'display: flex; gap: 8px;',
            'tab' => 'padding: 8px 16px; font-size: 14px; font-weight: 500; color: #6b7280; border-radius: 8px; cursor: pointer; background: none; border: none; transition: background 0.15s;',
            'tab_active' => 'padding: 8px 16px; font-size: 14px; font-weight: 500; color: white; background: #2563eb; border-radius: 8px; cursor: pointer; border: none;',
        ],
        'boxed' => [
            'list' => 'display: flex; background: #f3f4f6; padding: 4px; border-radius: 8px;',
            'tab' => 'padding: 8px 16px; font-size: 14px; font-weight: 500; color: #6b7280; border-radius: 6px; cursor: pointer; background: none; border: none; transition: color 0.15s;',
            'tab_active' => 'padding: 8px 16px; font-size: 14px; font-weight: 500; color: #111827; background: white; border-radius: 6px; cursor: pointer; border: none; box-shadow: 0 1px 2px rgba(0,0,0,0.05);',
        ],
    ];
    $styles = $variants[$variant] ?? $variants['default'];
@endphp

<div>
    {{-- Tab List --}}
    <div style="{{ $styles['list'] }}" role="tablist">
        @foreach($tabs as $key => $tab)
            <button
                wire:click="setActive('{{ $key }}')"
                style="{{ $active === $key ? $styles['tab_active'] : $styles['tab'] }}"
                role="tab"
                aria-selected="{{ $active === $key ? 'true' : 'false' }}"
                aria-controls="panel-{{ $key }}"
            >
                {{ is_array($tab) ? $tab['label'] : $tab }}
            </button>
        @endforeach
    </div>

    {{-- Tab Panels --}}
    <div style="margin-top: 16px;">
        @foreach($tabs as $key => $tab)
            <div
                id="panel-{{ $key }}"
                role="tabpanel"
                style="{{ $active === $key ? '' : 'display: none;' }}"
            >
                {!! is_array($tab) && isset($tab['content']) ? $tab['content'] : '' !!}
            </div>
        @endforeach
    </div>
</div>
