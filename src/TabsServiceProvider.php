<?php

namespace MrShaneBarron\Tabs;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class TabsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-tabs.php', 'ld-tabs');
    }

    public function boot(): void
    {
        Livewire::component('ld-tabs', Livewire\Tabs::class);
        $this->loadViewComponentsAs('ld', [View\Components\Tabs::class, View\Components\Tab::class]);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-tabs');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/ld-tabs.php' => config_path('ld-tabs.php')], 'ld-tabs-config');
        }
    }
}
