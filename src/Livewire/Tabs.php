<?php

namespace MrShaneBarron\Tabs\Livewire;

use Livewire\Component;

class Tabs extends Component
{
    public ?string $active = null;
    public array $tabs = [];
    public string $variant = 'default';

    public function mount(?string $active = null, array $tabs = [], string $variant = 'default'): void
    {
        $this->tabs = $tabs;
        $this->variant = $variant;
        $this->active = $active ?? (count($tabs) > 0 ? array_key_first($tabs) : null);
    }

    public function setActive(string $key): void
    {
        $this->active = $key;
    }

    public function render()
    {
        return view('ld-tabs::livewire.tabs');
    }
}
