<?php

namespace App\Repositories\Contracts;

use App\Models\Discos;
use Illuminate\Support\Collection;

interface CatalogoDiscosRepositoryInterface {

    function listarCatalogoDiscos(Array $request): Collection;

    function salvarCatalogoDiscos(Array $request): Discos;

    function atualizarCatalogoDiscos(int $id_disco, Array $request): bool;

    function deletarCatalogoDiscos(Array $request): bool;

}
