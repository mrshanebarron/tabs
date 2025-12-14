<div
    x-data="{ active: '{{ $active }}' }"
    class="{{ $orientation === 'vertical' ? 'flex gap-4' : '' }}"
>
    {{-- Tab Navigation --}}
    <div class="{{ $orientation === 'vertical' ? 'flex flex-col space-y-1' : 'border-b border-gray-200' }}">
        <nav class="{{ $orientation === 'vertical' ? 'flex flex-col' : '-mb-px flex space-x-8' }}" aria-label="Tabs">
            @foreach($tabs as $key => $label)
                <button
                    @click="active = '{{ $key }}'"
                    :class="{
                        @if($style === 'underline')
                        'border-blue-500 text-blue-600': active === '{{ $key }}',
                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': active !== '{{ $key }}'
                        @elseif($style === 'pills')
                        'bg-blue-100 text-blue-700': active === '{{ $key }}',
                        'text-gray-500 hover:text-gray-700 hover:bg-gray-100': active !== '{{ $key }}'
                        @else
                        'bg-white border-gray-200 border-b-white': active === '{{ $key }}',
                        'bg-gray-50 border-gray-200 text-gray-500': active !== '{{ $key }}'
                        @endif
                    }"
                    class="@if($style === 'underline') border-b-2 py-4 px-1 text-sm font-medium @elseif($style === 'pills') px-3 py-2 text-sm font-medium rounded-md @else px-4 py-2 text-sm font-medium border rounded-t-lg @endif whitespace-nowrap"
                >
                    {{ $label }}
                </button>
            @endforeach
        </nav>
    </div>

    {{-- Tab Content --}}
    <div class="{{ $orientation === 'vertical' ? 'flex-1' : 'mt-4' }}">
        {{ $slot }}
    </div>
</div>
