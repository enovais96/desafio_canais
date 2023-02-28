<?php

namespace App\Services;

use App\Models\Pedido;
use App\Repositories\Contracts\PedidoRepositoryInterface;
use Illuminate\Support\Collection;

class PedidoService implements Contracts\PedidoServiceInterface {

    protected $repository;

    public function __construct(PedidoRepositoryInterface $repository) {
        $this->repository          = $repository;
    }

    public function listarPedido(Array $request, String $data_pedido_inicial, String $data_pedido_final): Collection {

        if($data_pedido_inicial != null && $data_pedido_final != null){
            return $this->repository->listarPedidoPeriodo($request, $data_pedido_inicial, $data_pedido_final);
        }

        if($data_pedido_inicial != null){
            return $this->repository->listarPedidoDataInicial($request, $data_pedido_inicial);
        }

        if($data_pedido_final != null){
            return $this->repository->listarPedidoDataFinal($request, $data_pedido_final);
        }

        return $this->repository->listarPedido($request);
    }

    public function salvarPedido(Array $request): Pedido {
        return $this->repository->salvarPedido($request);
    }

    public function deletarPedido(Array $request): bool {
        return $this->repository->deletarPedido($request);
    }

}
