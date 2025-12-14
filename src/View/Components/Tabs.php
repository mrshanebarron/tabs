<?php

namespace MrShaneBarron\Tabs\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
    public function __construct(
        public string $active = '',
        public string $style = 'underline',
        public string $orientation = 'horizontal',
        public array $tabs = []
    ) {
        $this->active = $active ?: (count($tabs) > 0 ? array_key_first($tabs) : '');
    }

    public function render(): View
    {
        return view('ld-tabs::components.tabs');
    }
}
