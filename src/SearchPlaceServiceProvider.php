<?php

namespace Choirool\SearchPlace;

use Illuminate\Support\ServiceProvider;

class SearchPlaceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('search.place', function ($app) {
            return new SearchPlace();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'search-place');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' =>   config_path('search-place.php'),
            ], 'config');
        }
    }
}
