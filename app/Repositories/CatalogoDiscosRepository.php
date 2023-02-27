<?php

namespace App\Repositories;

use App\Models\Discos;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class CatalogoDiscosRepository implements Contracts\CatalogoDiscosRepositoryInterface {

    public function listarCatalogoDiscos(): Collection {
        return DB::table("discos")->get();
    }

    public function salvarCatalogoDiscos(Array $request): Discos {
        return Discos::create($request);
    }
}
