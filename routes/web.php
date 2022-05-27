<?php

use Illuminate\Support\Facades\Route;
//importar o controler de productos
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController; 
Use App\Http\Controllers\UserController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CategoryController;
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

//as rotas acedem aos controller, dentro dos controllers estão as funções
//passando como array o controller 'ProductController' e o nome da action 'index'
Route::get('/', [ProductController::class, 'index']);

//Rota que da acesso a página da criação de produtos 
Route::get('/create', [ProductController::class, 'create'])->middleware('auth');

//rota que adiciona produtos na loja
//a rota de adicionar produtosna loja só estara disponível 
//para utilizadores logados
Route::post('/products', 
[ProductController::class, 'store'])->middleware('auth');

//Rota que permite a apresentação dos detalhes de cada produto 
Route::get('/detail/{id}', [ProductController::class, 'detail']);

//Rota que permite aceder aos produtos disponíveis no sistema 
Route::get('/show', [ProductController::class, 'show']);

//Rota que permite aceder a página sobre nós 
Route::get('/about', [ProductController::class, 'about']);

//rota que permite aceder a página pesquisa de produtos
Route::get('search', 
[ProductController::class, 'search']);

//rota que permite adicionar produtos no carrinho
//apenas os utilizadores logados poderão ter acesso
Route::post('add_to_cart', 
[ProductController::class, 'addToCart'])->middleware('auth');

//rota que adiciona produtos aos favoritos
//a rota de adicionar produtos aos favoritos só estara disponível 
//para utilizadores logados
Route::post('add_to_favo', 
[ProductController::class, 'addToFavo'])->middleware('auth');

//rota que permite adicionar produtos no carrinho sem ver os detalhes
//apenas os utilizadores logados poderão ter acesso
Route::post('quick_add_to_cart', 
[ProductController::class, 'quickAddToCart'])->middleware('auth');

//rota que permite listar os produtos no carrinho de compras
Route::get('cartlist', 
[ProductController::class, 'cartList'])->middleware('auth');

//rota que permite listar os produtos na lista de favoritos de um utilizador
Route::get('favolist', 
[ProductController::class, 'favoList'])->middleware('auth');

//rota que permite remover os produtos dos favoritos de um cliente
Route::get('remove_from_favo/{id}', 
[ProductController::class, 'removeFromFavo']);

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

//rota que da acesso a página que lista os produtos cadastrados no sistema
Route::get('/productlist', [ProductController::class, 'productlist']);

//rota que permite deletar produtos
Route::delete('/products/{id}', [ProductController::class,'destroy']);

//rota que permite aceder a página de contacto
Route::get('/contact',[FormController::class,'contact']);

//rota que permite enviar um formulário no sistema
Route::post('/contact', [FormController::class, 'store']);

//rota que permite ter acesso a página de delivery
Route::get('delivery',[DeliveryController::class,'delivery'])->middleware('auth');

//rota que permite adicionar dados de envio de um pedido
Route::post('/add_delivery_info',[DeliveryController::class,'addDeliveryInfo'])->middleware('auth');

//rota que permite ter acesso aos delivers de um cliente
Route::get('/delivers',[DeliveryController::class,'showDelivers'])->middleware('auth');

//rota criada automaticamente pelo livewire
//está será reponsável por requerir a autenticação do utilizador 
//antes de entrar na sua dashboard
//o middleware é um mecanismo utilizado filtrar os pedidos http, interage com
//os pedidos antes de chegar aos controllers
/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

//rota que permite ter acesso a página de produtos + categoria
Route::get('category',[CategoryController::class,'category']);

//Rota que permite a apresentação de produtos de determinada categoria
Route::get('/category/{id}', [CategoryController::class, 'category_products']);

//rota que permite aceder a view de dashboard do utilizador
Route::get('/dashboard',[UserController::class, 'dashboard'])->middleware('auth');

//rota que permite ter acesso a view de atualizar dados do utilizador
Route::get('/edituser/{id}',[UserController::class,'edituser'])->middleware('auth');

//rota que permite atualizar os dados do utilizador
Route::put('/edituser/{id}', [UserController::class, 'updateUser'])->middleware('auth');

Route::get('mapa', function(){
    return view ('mapa');
});