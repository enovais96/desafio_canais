<?php

namespace App\Repositories\Contracts;

use App\Models\Pedido;
use Illuminate\Support\Collection;

interface PedidoRepositoryInterface {

    function listarPedido(Array $request): Collection;

    public function listarPedidoPeriodo(Array $request, String $data_pedido_inicial, String $data_pedido_final): Collection;

    public function listarPedidoDataInicial(Array $request, String $data_pedido_inicial): Collection;

    public function listarPedidoDataFinal(Array $request, String $data_pedido_final): Collection;

    function salvarPedido(Array $request): Pedido;

    function deletarPedido(Array $request): bool;

}
