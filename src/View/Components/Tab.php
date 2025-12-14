<?php

namespace MrShaneBarron\Tabs\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tab extends Component
{
    public function __construct(
        public string $key,
        public string $title,
        public ?string $icon = null
    ) {}

    public function render(): View
    {
        return view('ld-tabs::components.tab');
    }
}
