<?php

namespace MrShaneBarron\Tabs\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Tabs extends Component
{
    public string $active;
    public string $style = 'underline';
    public string $orientation = 'horizontal';
    public array $tabs = [];

    public function mount(string $active = '', string $style = 'underline', string $orientation = 'horizontal', array $tabs = []): void
    {
        $this->active = $active ?: (count($tabs) > 0 ? array_key_first($tabs) : '');
        $this->style = $style;
        $this->orientation = $orientation;
        $this->tabs = $tabs;
    }

    public function setActive(string $key): void
    {
        $this->active = $key;
        $this->dispatch('tab-changed', key: $key);
    }

    public function render(): View
    {
        return view('ld-tabs::components.tabs');
    }
}
