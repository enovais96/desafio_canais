<?php

namespace App\Repositories;

use App\Models\Discos;
use Illuminate\Support\Collection;

class CatalogoDiscosRepository implements Contracts\CatalogoDiscosRepositoryInterface {

    private function model() {
        return Discos::class;
    }
    public function listarCatalogoDiscos(Array $request): Collection {
        return $this->model()::where($request)->get();
    }

    public function salvarCatalogoDiscos(Array $request): Discos {
        return $this->model()::create($request);
    }

    function atualizarCatalogoDiscos(int $id_disco, Array $request): bool {
        return $this->model()::where('id_disco', $id_disco)->update($request);
    }

    function deletarCatalogoDiscos(Array $request): bool {
        $disco = $this->model()::where($request)->first();

        return $disco->delete();
    }

}
