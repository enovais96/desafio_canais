<?php

namespace App\Repositories;

use App\Models\Pedido;
use Illuminate\Support\Collection;

class PedidoRepository implements Contracts\PedidoRepositoryInterface {

    private function model() {
        return Pedido::class;
    }
    public function listarPedido(Array $request): Collection {
        return $this->model()::where($request)->get();
    }

    public function listarPedidoPeriodo(Array $request, String $data_pedido_inicial, String $data_pedido_final): Collection {
        return $this->model()::where($request)->whereBetween('created_at', [$data_pedido_inicial, $data_pedido_final])->get();
    }

    public function listarPedidoDataInicial(Array $request, String $data_pedido_inicial): Collection  {
        return $this->model()::where($request)->whereDate('created_at', '>=', date($data_pedido_inicial))->get();
    }

    public function listarPedidoDataFinal(Array $request, String $data_pedido_final): Collection  {
        return $this->model()::where($request)->whereDate('created_at', '<=', date($data_pedido_final))->get();
    }

    public function salvarPedido(Array $request): Pedido {
        return $this->model()::create($request);
    }

    public function deletarPedido(Array $request): bool {
        $pedido = $this->model()::where($request)->first();

        return $pedido->delete();
    }

}
