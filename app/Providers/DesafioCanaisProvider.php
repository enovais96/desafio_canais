<?php

namespace App\Providers;

use App\Repositories\CatalogoDiscosRepository;
use App\Repositories\Contracts\CatalogoDiscosRepositoryInterface;
use App\Services\CatalogoDiscosService;
use App\Services\Contracts\CatalogoDiscosServiceInterface;
use Illuminate\Support\ServiceProvider;

class DesafioCanaisProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CatalogoDiscosServiceInterface::class, CatalogoDiscosService::class);
        $this->app->bind(CatalogoDiscosRepositoryInterface::class, CatalogoDiscosRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
