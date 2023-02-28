<?php

namespace App\Services\Contracts;

use App\Models\Cliente;
use Illuminate\Support\Collection;

interface ClienteServiceInterface {
    function listarCliente(Array $request): Collection;

    function salvarCliente(Array $request): Cliente;

    function atualizarCliente(int $id_cliente, Array $request): bool;

    function deletarCliente(Array $request): bool;
}
