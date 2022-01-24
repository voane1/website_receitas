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
Route::get('/', [HomeController::class, 'index']);
Route::get('/minhasReceitas', [ReceitasController::class, 'index']);
Route::delete('/minhasReceitas/{id}', [ReceitasController::class, 'destroy']);
Route::get('/editReceitas/{id}', [ReceitasController::class, 'edit']);
//Route::put('editReceitas/{id}',[ReceitasController::class, 'update']);
Route::get('/inserirReceitas', [ReceitasController::class, 'create']);
Route::post('/inserirReceitas', [ReceitasController::class, 'store']);


Route::get('user', function (){

   return "usuario ";
});

