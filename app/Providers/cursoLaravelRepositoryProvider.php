<?php

namespace cursoLaravel\Providers;

use Illuminate\Support\ServiceProvider;

class cursoLaravelRepositoryProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(\cursoLaravel\Repositories\ClientRepository::class, \cursoLaravel\Repositories\ClientRepositoryEloquent::class);

        $this->app->bind(\cursoLaravel\Repositories\ProjetoRepository::class, \cursoLaravel\Repositories\ProjetoRepositoryEloquent::class);
    }

}
