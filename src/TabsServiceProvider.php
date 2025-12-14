<?php

namespace MrShaneBarron\Tabs;

use Illuminate\Support\ServiceProvider;

class TabsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tabs.php', 'sb-tabs');
    }

    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-tabs', Livewire\Tabs::class);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-tabs');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/tabs.php' => config_path('sb-tabs.php'),
            ], 'sb-tabs-config');
        }
    }
}
