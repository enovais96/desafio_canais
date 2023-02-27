<?php

namespace App\Repositories\Contracts;

use App\Models\Discos;
use Illuminate\Support\Collection;

interface CatalogoDiscosRepositoryInterface {

    public function listarCatalogoDiscos(): Collection;

    function salvarCatalogoDiscos(Array $request): Discos;
}
