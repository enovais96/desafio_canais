<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CatalogoDiscosController;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('catalogoDiscos', [CatalogoDiscosController::class, 'listar']);
Route::post('catalogoDiscos', [CatalogoDiscosController::class, 'cadastrar']);
Route::put('catalogoDiscos/{id_disco}', [CatalogoDiscosController::class, 'atualizar']);
Route::delete('catalogoDiscos', [CatalogoDiscosController::class, 'deletar']);

Route::get('cliente', [ClienteController::class, 'listar']);
Route::post('cliente', [ClienteController::class, 'cadastrar']);
Route::put('cliente/{id_cliente}', [ClienteController::class, 'atualizar']);
Route::delete('cliente', [ClienteController::class, 'deletar']);
