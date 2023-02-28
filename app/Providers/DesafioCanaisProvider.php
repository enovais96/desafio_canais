<?php

namespace App\Providers;

use App\Repositories\CatalogoDiscosRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\Contracts\CatalogoDiscosRepositoryInterface;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use App\Services\CatalogoDiscosService;
use App\Services\ClienteService;
use App\Services\Contracts\CatalogoDiscosServiceInterface;
use App\Services\Contracts\ClienteServiceInterface;
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
        $this->app->bind(ClienteServiceInterface::class, ClienteService::class);
        $this->app->bind(ClienteRepositoryInterface::class, ClienteRepository::class);
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
