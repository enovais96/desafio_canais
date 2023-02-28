<?php

namespace App\Services;

use App\Models\Discos;
use App\Repositories\Contracts\CatalogoDiscosRepositoryInterface;
use Illuminate\Support\Collection;

class CatalogoDiscosService implements Contracts\CatalogoDiscosServiceInterface {

    protected $repository;

    public function __construct(CatalogoDiscosRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function listarCatalogoDiscos(Array $request): Collection {
        return $this->repository->listarCatalogoDiscos($request);
    }

    public function salvarCatalogoDiscos(Array $request): Discos {
        return $this->repository->salvarCatalogoDiscos($request);
    }

    function atualizarCatalogoDiscos(int $id_disco, Array $request): bool {
        return $this->repository->atualizarCatalogoDiscos($id_disco, $request);
    }
    public function deletarCatalogoDiscos(Array $request): bool {
        return $this->repository->deletarCatalogoDiscos($request);
    }

}
