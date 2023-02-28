<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Support\Collection;

class ClienteRepository implements Contracts\ClienteRepositoryInterface {

    private function model() {
        return Cliente::class;
    }
    public function listarCliente(Array $request): Collection {
        return $this->model()::where($request)->get();
    }

    public function salvarCliente(Array $request): Cliente {
        return $this->model()::create($request);
    }

    function atualizarCliente(int $id_cliente, Array $request): bool {
        return $this->model()::where('id_cliente', $id_cliente)->update($request);
    }

    function deletarCliente(Array $request): bool {
        $cliente = $this->model()::where($request)->first();

        return $cliente->delete();
    }

}
