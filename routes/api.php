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
Route::get('utilizador/{id}/likes', [ApiUtilizadorControllerR::class, 'likes']);
Route::get('utilizador/{id}/comentarios', [ApiUtilizadorControllerR::class, 'comentarios']);
Route::apiResource('receitas', ApiReceitasController::class);
Route::get('receitas/{id}/utilizador', [ApiReceitasController::class, 'utilizador']);
Route::get('receitas/{id}/likes', [ApiReceitasController::class, 'likes']);
Route::get('receitas/{id}/comentarios', [ApiReceitasController::class, 'comentarios']);
Route::apiResource('likes', \App\Http\Controllers\Api\ApiLikeController::class);
Route::get('likes/{id}/utilizador', [\App\Http\Controllers\Api\ApiLikeController::class, 'utilizador']);
Route::get('likes/{id}/receitas', [\App\Http\Controllers\Api\ApiLikeController::class, 'receitas']);
Route::apiResource('comentarios', \App\Http\Controllers\Api\ApiComentariosController::class);
Route::get('comentarios/{id}/utilizador', [\App\Http\Controllers\Api\ApiComentariosController::class, 'utilizador']);
Route::get('comentarios/{id}/receitas', [\App\Http\Controllers\Api\ApiComentariosController::class, 'receitas']);




