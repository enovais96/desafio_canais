<?php

namespace App\Http\Controllers;
use App\Http\Requests\CatalogosDiscosRequest;
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

    public function listar() {
        $this->response['data'] = $this->service->listarCatalogoDiscos();

        return new JsonResponse($this->response);
    }


    public function cadastrar(Request $request) {
        $validator = Validator::make($request->all(), $this->regrasCatalogoDiscos(), $this->mensagemRegrasCatalogoDiscos());
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        $this->response['data'] = $this->service->salvarCatalogoDiscos($request->all());

        return new JsonResponse($this->response);
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

    private function mensagemRegrasCatalogoDiscos(): array{
        return [
            'required'=> 'O campo :attribute é obrigatório.',
            'size'    => 'O campo :attribute deve conter no máximo o tamanho :size.',
            'between' => 'O campo :attribute deve estar entre :min - :max.',
            'min' => 'O campo :attribute deve ter o tamanho minímo de :min',
            'max' => 'O campo :attribute deve ter o tamanho máximo de :max',
            'string' => 'O campo :attribute deve ser do tipo string',
            'integer' => 'O campo :attribute deve ser do tipo integer'
        ];
    }
}
