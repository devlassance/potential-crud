<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DevsController;

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

//Validando funcionamento da api
Route::get('/ping', function(Request $request){
    return ['pong' => true];
});

//Retorna todos os desenvolvedores
Route::get('/devs', [DevsController::class, 'all'])->name('api.all');

//Retorna os dados de um desenvolvedor
Route::get('/dev/{id}',  [DevsController::class, 'one']);


//Adiciona um novo desenvolvedor
Route::post('/devs', [DevsController::class, 'new']);

//Atualiza os dados de um desenvolvedor
Route::put('/dev/{id}', [DevsController::class, 'edit']);

//Apaga o registro de um desenvolvedor
Route::delete('/dev/{id}', [DevsController::class, 'delete'])->name('api.del');