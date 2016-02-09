<?php

namespace finLaravel\Providers;

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
        $this->app->bind(\finLaravel\Repositories\ClientRepository::class, \finLaravel\Repositories\ClientRepositoryEloquent::class);
        
        $this->app->bind(\finLaravel\Repositories\BancoRepository::class, \finLaravel\Repositories\BancoRepositoryEloquent::class);
        
        $this->app->bind(\finLaravel\Repositories\ContaBancariaRepository::class, \finLaravel\Repositories\ContaBancariaRepositoryEloquent::class);

        $this->app->bind(\finLaravel\Repositories\ProjetoRepository::class, \finLaravel\Repositories\ProjetoRepositoryEloquent::class);
        
        $this->app->bind(\finLaravel\Repositories\ProjetoNotasRepository::class, \finLaravel\Repositories\ProjetoNotasRepositoryEloquent::class);
    }

}
