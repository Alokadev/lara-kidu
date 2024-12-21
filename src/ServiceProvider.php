<?php

namespace Larakidu;

use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register commands
        $this->commands([
            Commands\MakeKiduController::class,
            Commands\MakeKiduModel::class,
            Commands\MakeKiduRepository::class,
        ]);
    }

    public function boot()
    {
        // Publish stubs
        $this->publishes([
            __DIR__ . '/../stubs' => base_path('stubs'),
        ], 'stubs');
    }
}
