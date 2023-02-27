<?php

namespace App\Services;

use App\Models\Discos;
use App\Repositories\Contracts\CatalogoDiscosRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class CatalogoDiscosService implements Contracts\CatalogoDiscosServiceInterface {

    protected $repository;

    public function __construct(CatalogoDiscosRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function listarCatalogoDiscos(): Collection {
        return $this->repository->listarCatalogoDiscos();
    }

    public function salvarCatalogoDiscos(Array $request): Discos {
        return $this->repository->salvarCatalogoDiscos($request);
    }

}
