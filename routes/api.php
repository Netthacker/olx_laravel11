<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StatesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;


/**
 * Rotas de Utilidades
 *  [X] - /ping --responde com Pong
 *
 *  - ROTAS DE AUTENTICAÇÃO - via token
 *  [ ] - /user/sigin - login
 *  [ ] - /user/signup - registro
 *  [ ] - /user/me -- info do usuário logado
 *
 *  - Rotas de config geral
 * [X] - /states - listar os estados
 * [X] - /categories - listar as categorias
 *
 *  - Rotas de Anúncios
 * [ ] - /ad/list - listar todos os anúncios
 * [ ] - /ad/:id - listar um anúncio único
 * [ ] - /ad/add - adicionar um novo anúncio
 * [ ] - /ad/:id(PUT) - editar um anúncio publicado
 * [ ] - /ad/:id(DELETE) - deletar um anúncio
 * [ ] - /ad/:id/:image(DELETE) - deletar uma img de um anúncio
 */

Route::get('/ping', function() {
    return response()->json(['Pong'=>true], 200);
});

Route::get('/states',[StatesController::class,'index']);
Route::post('/states',[StatesController::class,'store']);

Route::get('/categories',[CategoriesController::class,'index']);

Route::post('user/signup', [UserController::class,'signup']);
Route::post('user/signin', [UserController::class,'signin']);

Route::get('user/me', [UserController::class,'me'])->middleware('auth:sanctum');
