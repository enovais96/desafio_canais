<?php

namespace App\Services\Contracts;

use App\Models\Discos;
use Illuminate\Support\Collection;

interface CatalogoDiscosServiceInterface {
    function listarCatalogoDiscos(Array $request): Collection;

    function salvarCatalogoDiscos(Array $request): Discos;

    function atualizarCatalogoDiscos(int $id_disco, Array $request): bool;

    function deletarCatalogoDiscos(Array $request): bool;

    function disponibiliadeEstoque(Array $request): bool;

    function voltarParaEstoquePedidoCancelado(Collection $request): bool;
}
