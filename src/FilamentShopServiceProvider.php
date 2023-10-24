<?php

namespace Igwen6w\FilamentShop;

use Illuminate\Support\ServiceProvider;

class FilamentShopServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament-shop');
    }
}
