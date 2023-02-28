<?php

namespace App\Http\Controllers;
use App\Services\Contracts\CatalogoDiscosServiceInterface;
use App\Services\Contracts\PedidoServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller {

    /**
     * @var
     */
    private $service;

    private $serviceCatalogo;

    public function __construct(PedidoServiceInterface $service, CatalogoDiscosServiceInterface $serviceCatalogo) {
        $this->service         = $service;
        $this->serviceCatalogo = $serviceCatalogo;
    }

    public function listar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasListarPedido());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = $this->service->listarPedido($request->only($this->camposPermitidos()), (String) $request['data_pedido_inicial'], (String) $request['data_pedido_final']);

        return new JsonResponse($this->response);
    }


    public function cadastrar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasPedido());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        if($this->serviceCatalogo->disponibiliadeEstoque($request->only($this->camposPermitidos()))){
            $this->response['data'] = $this->service->salvarPedido($request->only($this->camposPermitidos()));

            return new JsonResponse($this->response);
        }

        $this->response['data'] = "Estoque não disponível para esse pedido.";

        return new JsonResponse($this->response, 400);
    }

    public function deletar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasDeletarPedido());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $pedido = $this->service->listarPedido($request->only($this->camposPermitidos()));

        if($this->serviceCatalogo->voltarParaEstoquePedidoCancelado($pedido)){
            $this->response['data'] = ($this->service->deletarPedido($request->only($this->camposPermitidos()))) ? 'Pedido deletado com sucesso' : 'Falha ao deletar o pedido';

            return new JsonResponse($this->response);
        }

        $this->response['data'] = "Não foi possível voltar para estoque esse pedido antes de excluir.";

        return new JsonResponse($this->response);
    }

    private function regrasListarPedido(): array{
        return [
            'id_pedido'           => 'nullable|string|max:255',
            'id_cliente'          => 'nullable|string|max:30',
            'data_pedido_inicial' => 'nullable|date',
            'data_pedido_final'   => 'nullable|date'
        ];
    }

    private function regrasPedido(): array{
        return [
            'id_cliente'        => 'required|exists:cliente,id_cliente',
            'id_disco'          => 'required|exists:discos,id_disco',
            'quantidade_disco'  => 'required|integer'
        ];
    }

    private function regrasDeletarPedido(): array {
        return [
            'id_pedido' => 'required|exists:pedido,id_pedido'
        ];
    }

    private function camposPermitidos(): array {
        return [
            'id_pedido',
            'id_cliente',
            'id_disco',
            'quantidade_disco'
        ];
    }
}
