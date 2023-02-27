<?php

namespace App\Services\Contracts;

use App\Models\Discos;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface CatalogoDiscosServiceInterface {
    function listarCatalogoDiscos(): Collection;

    function salvarCatalogoDiscos(Array $request): Discos;

}
