<?php

namespace App\Services;

use App\Models\Cliente;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use Illuminate\Support\Collection;

class ClienteService implements Contracts\ClienteServiceInterface {

    protected $repository;

    public function __construct(ClienteRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function listarCliente(Array $request): Collection {
        return $this->repository->listarCliente($request);
    }

    public function salvarCliente(Array $request): Cliente {
        return $this->repository->salvarCliente($request);
    }

    function atualizarCliente(int $id_cliente, Array $request): bool {
        return $this->repository->atualizarCliente($id_cliente, $request);
    }
    public function deletarCliente(Array $request): bool {
        return $this->repository->deletarCliente($request);
    }

}
