<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Entities\Project;
use App\Observers\ProjectObserver;

class ObserveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Project::observe(ProjectObserver::class);
    }
}
