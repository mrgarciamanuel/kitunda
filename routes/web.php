<?php

use Illuminate\Support\Facades\Route;
//importar o controler de productos
use App\Http\Controllers\ProductController;
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

//as rotas acedem aos controller, e dentro dos controllers estão as funções de lógica do programa
//passando como array o controller 'ProductController' e o nome da action 'index'
Route::get('/', [ProductController::class, 'index']);

//Rota que permite a acriação de produtos 
Route::get('/create', [ProductController::class, 'create']);

//Rota que permite a apresentação de produtos 
Route::get('/detail/{id}', [ProductController::class, 'detail']);

//Rota que aos detalhes de cada produto 
Route::get('/show', [ProductController::class, 'show']);

//rota para pesquisa de produtos
Route::get('search', 
[ProductController::class, 'search']);

//rota que permite adicionar produtos no carrinho
//apenas os utilizadores logados poderão ter acesso
Route::post('add_to_cart', 
[ProductController::class, 'addToCart'])->middleware('auth');

//rota que permite listar os produtos no carrinho de compras
Route::get('cartlist', 
[ProductController::class, 'cartList']);

Route::get('/contact', function () {
    return view('contact');
});

//rota criada automaticamente pelo livewire
//estaá será reponsável por requerir a autenticação do utilizador 
//antes de entrar na sua dashboard
//o middleware é um mecanismo que para filtrar os pedidos http, interagem com
//os pedidos antes de chegar aos controllers
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
