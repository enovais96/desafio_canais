<?php

namespace App\Services\Contracts;

use App\Models\Pedido;
use Illuminate\Support\Collection;

interface PedidoServiceInterface {

    function listarPedido(Array $request, String $data_pedido_inicial, String $data_pedido_final): Collection;

    function salvarPedido(Array $request): Pedido;

    function deletarPedido(Array $request): bool;
}
