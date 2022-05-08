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

//Rota que permitr aceder aos detalhes de cada produto 
Route::get('/show', [ProductController::class, 'show']);

//Rota que permitr aceder a página de contactos 
Route::get('/about', [ProductController::class, 'about']);

//rota para pesquisa de produtos
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

//rota que permite listar os produtos nos favoritos de um utilizador
Route::get('favolist', 
[ProductController::class, 'favoList'])->middleware('auth');

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

//rota que permite ter acesso a 
//Route::post('/contact', 
//[FormController::class, 'store']);

//rota que permite ter acesso a página de delivery
Route::get('delivery',[DeliveryController::class,'delivery'])->middleware('auth');

//rota que permite adicionar dados envio de um pedido
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

//rota que permite ter acesso a página de delivery
Route::get('category',[CategoryController::class,'category'])->middleware('auth');

//Rota que permite a apresentação de produtos 
Route::get('/category/{id}', [CategoryController::class, 'category_products']);

//rota que permite aceder a view de dashboard
Route::get('/dashboard',[UserController::class, 'dashboard'])->middleware('auth');

//rota que permite ter acesso a view de atualizar dados do utilizador
Route::get('/edituser/{id}',[UserController::class,'edituser'])->middleware('auth');

//rota que permite atualizar os dados do utilizador
Route::put('/edituser/{id}', [UserController::class, 'updateUser'])->middleware('auth');