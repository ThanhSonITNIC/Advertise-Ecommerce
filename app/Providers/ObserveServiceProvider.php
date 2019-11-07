<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Entities\Project;
use App\Observers\ProjectObserver;
use App\Entities\ProjectMaterial;
use App\Observers\ProjectMaterialObserver;
use App\Entities\ImportMaterial;
use App\Observers\ImportMaterialObserver;

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
        ProjectMaterial::observe(ProjectMaterialObserver::class);
        ImportMaterial::observe(ImportMaterialObserver::class);
    }
}
