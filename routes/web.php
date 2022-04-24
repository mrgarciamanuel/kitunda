<?php

use Illuminate\Support\Facades\Route;
//importar o controler de productos
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
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

//Rota que da acesso a página da criação de produtos 
Route::get('/create', [ProductController::class, 'create'])->middleware('auth');

//rota que adiciona produtos na loja
//a rota de adicionar produtosna loja só estara disponível 
//para utilizadores logados
Route::post('/products', 
[ProductController::class, 'store'])->middleware('auth');

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

//rota que permite adicionar produtos no carrinho sem ver os detalhes
//apenas os utilizadores logados poderão ter acesso
Route::post('quick_add_to_cart', 
[ProductController::class, 'quickAddToCart'])->middleware('auth');

//rota que permite listar os produtos no carrinho de compras
Route::get('cartlist', 
[ProductController::class, 'cartList']);

//rota que permite remover os produtos no carrinho de compras
Route::get('remove_from_cart/{id}', 
[ProductController::class, 'removeFromCart']);

//rota que permite concluir compra
Route::get('ordernow',[ProductController::class,'orderNow']);

//rota que epermite finalizar compra
Route::post('orderplace',[ProductController::class,'orderPlace']);

//rota que permite remover os produtos no carrinho de compras
Route::get('myorders', 
[ProductController::class, 'myOrders']);

//rota que da acesso ao admin o acesso aos produtos cadastrados no sistema
Route::get('/productlist', [ProductController::class, 'productlist']);

//rota que permite deletar produtos
Route::delete('/products/{id}', [ProductController::class,'destroy']);

//rota que permite contacto
Route::get('/contact',[FormController::class,'contact']);

Route::post('/contact', 
[FormController::class, 'store']);



//rota criada automaticamente pelo livewire
//está será reponsável por requerir a autenticação do utilizador 
//antes de entrar na sua dashboard
//o middleware é um mecanismo utilizado filtrar os pedidos http, interage com
//os pedidos antes de chegar aos controllers
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
