<?php

namespace App\Http\Controllers;
use App\Services\Contracts\CatalogoDiscosServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogoDiscosController extends Controller {

    /**
     * @var
     */
    private $service;

    public function __construct(CatalogoDiscosServiceInterface $service) {
        $this->service = $service;
    }

    public function listar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasListarCatalogoDiscos());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = $this->service->listarCatalogoDiscos($request->only($this->camposPermitidos()));

        return new JsonResponse($this->response);
    }

    public function cadastrar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasCatalogoDiscos());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = $this->service->salvarCatalogoDiscos($request->only($this->camposPermitidos()));

        return new JsonResponse($this->response);
    }

    public function atualizar(int $id_disco, Request $request) {
        $validator = Validator::make($request->all(), $this->regrasCatalogoDiscos());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = ($this->service->atualizarCatalogoDiscos($id_disco, $request->only($this->camposPermitidos()))) ? 'Disco atualizado com sucesso' : 'Falha ao atualizar o disco';

        return new JsonResponse($this->response);
    }

    public function deletar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasDeletarCatalogoDiscos());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = ($this->service->deletarCatalogoDiscos($request->only($this->camposPermitidos()))) ? 'Disco deletado com sucesso' : 'Falha ao deletar o disco';

        return new JsonResponse($this->response);
    }

    private function regrasListarCatalogoDiscos(): array{
        return [
            'nome_disco'    => 'nullable|string|max:255',
            'artista_disco'         => 'nullable|string|max:255',
            'ano_lancamento_disco' => 'nullable|integer|min:1000|max:9999',
            'estilo_disco'         => 'nullable|string|max:255'
        ];
    }

    private function regrasCatalogoDiscos(): array{
        return [
            'nome_disco'    => 'required|string|max:255',
            'artista_disco'         => 'required|string|max:255',
            'ano_lancamento_disco' => 'required|integer|min:1000|max:9999',
            'estilo_disco'         => 'required|string|max:255',
            'quantidade_disco' => 'required|integer'
        ];
    }

    private function regrasDeletarCatalogoDiscos(): array {
        return [
            'id_disco' => 'required|exists:discos,id_disco'
        ];
    }

    private function camposPermitidos(): array {
        return [
            'id_disco',
            'nome_disco',
            'artista_disco',
            'ano_lancamento_disco',
            'estilo_disco',
            'quantidade_disco'
        ];
    }
}
