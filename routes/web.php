<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\ReceitasController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/','HomeController@index');
//Auth::routes();

//pagina inicial
Route::get('/', [HomeController::class, 'index']);

//minhas receitas
Route::get('/minhasReceitas', [ReceitasController::class, 'index']);
//excluir Receitas
Route::delete('/minhasReceitas/{id}', [ReceitasController::class, 'destroy']);
//editar Receitas
Route::get('/editReceitas/{id}', [ReceitasController::class, 'edit']);
Route::put('/minhasReceitas/{id}',[ReceitasController::class, 'update']);
//inserir Receitas
Route::get('/inserirReceitas', [ReceitasController::class, 'create']);
Route::post('/inserirReceitas', [ReceitasController::class, 'store']);

//consulta geral
Route::get('/resultadoPesquisa/', [HomeController::class, 'consulta']);



Route::get('user', function (){

   return "usuario ";
});

