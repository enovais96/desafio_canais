<?php

namespace App\Providers;

use App\Repositories\CatalogoDiscosRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\Contracts\CatalogoDiscosRepositoryInterface;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use App\Repositories\Contracts\PedidoRepositoryInterface;
use App\Repositories\PedidoRepository;
use App\Services\CatalogoDiscosService;
use App\Services\ClienteService;
use App\Services\Contracts\CatalogoDiscosServiceInterface;
use App\Services\Contracts\ClienteServiceInterface;
use App\Services\Contracts\PedidoServiceInterface;
use App\Services\PedidoService;
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
        $this->app->bind(PedidoServiceInterface::class, PedidoService::class);
        $this->app->bind(PedidoRepositoryInterface::class, PedidoRepository::class);
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
