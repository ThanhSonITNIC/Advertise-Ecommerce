<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConfigureRepository::class, \App\Repositories\ConfigureRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LevelRepository::class, \App\Repositories\LevelRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostTypeRepository::class, \App\Repositories\PostTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostRepository::class, \App\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UnitRepository::class, \App\Repositories\UnitRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectTypeRepository::class, \App\Repositories\ProjectTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectRepository::class, \App\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectCommentRepository::class, \App\Repositories\ProjectCommentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MaterialRepository::class, \App\Repositories\MaterialRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectMaterialRepository::class, \App\Repositories\ProjectMaterialRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ImportMaterialRepository::class, \App\Repositories\ImportMaterialRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ImportMaterialLogRepository::class, \App\Repositories\ImportMaterialLogRepositoryEloquent::class);
        //:end-bindings:
    }
}
