<?php

namespace App\Http\Controllers;
use App\Services\Contracts\ClienteServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller {

    /**
     * @var
     */
    private $service;

    public function __construct(ClienteServiceInterface $service) {
        $this->service = $service;
    }

    public function listar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasListarCliente());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = $this->service->listarCliente($request->only($this->camposPermitidos()));

        return new JsonResponse($this->response);
    }

    public function cadastrar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasCliente());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = $this->service->salvarCliente($request->only($this->camposPermitidos()));

        return new JsonResponse($this->response);
    }

    public function atualizar(int $id_cliente, Request $request) {
        $validator = Validator::make($request->all(), $this->regrasCliente());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = ($this->service->atualizarCliente($id_cliente, $request->only($this->camposPermitidos()))) ? 'Cliente atualizado com sucesso' : 'Falha ao atualizar o cliente';

        return new JsonResponse($this->response);
    }

    public function deletar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasDeletarCliente());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = ($this->service->deletarCliente($request->only($this->camposPermitidos()))) ? 'Cliente deletado com sucesso' : 'Falha ao deletar o cliente';

        return new JsonResponse($this->response);
    }

    private function regrasListarCliente(): array{
        return [
            'nome_cliente'    => 'nullable|string|max:255',
            'documento_cliente'         => 'nullable|string|max:30',
            'data_nascimento_cliente' => 'nullable|date',
            'email_cliente'         => 'nullable|email|string|max:255',
            'telefone_cliente' => 'nullable|integer'
        ];
    }

    private function regrasCliente(): array{
        return [
            'nome_cliente'    => 'required|string|max:255',
            'documento_cliente'         => 'required|string|max:30',
            'data_nascimento_cliente' => 'required|date',
            'email_cliente'         => 'required|email|string|max:255',
            'telefone_cliente' => 'required|integer'
        ];
    }

    private function regrasDeletarCliente(): array {
        return [
            'id_cliente' => 'required|exists:cliente,id_cliente'
        ];
    }

    private function camposPermitidos(): array {
        return [
            'id_cliente',
            'nome_cliente',
            'documento_cliente',
            'data_nascimento_cliente',
            'email_cliente',
            'telefone_cliente'
        ];
    }
}
