<?php

use App\Http\Controllers\Api\ApiReceitasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiUtilizadorControllerR;

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


Route::apiResource('utilizador', ApiUtilizadorControllerR::class);
Route::get('utilizador/{id}/receitas', [ApiUtilizadorControllerR::class, 'receitas']);
Route::apiResource('receitas', ApiReceitasController::class);
Route::get('receitas/{id}/utilizador', [ApiReceitasController::class, 'utilizador']);
Route::apiResource('like', \App\Http\Controllers\Api\ApiLikeController::class);
Route::apiResource('comentario', \App\Http\Controllers\Api\ApiComentariosController::class);




