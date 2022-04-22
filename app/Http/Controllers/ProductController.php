<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//importar o model de produtos "Responsável por comunicar com a base de dados"
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;


class ProductController extends Controller
{
    //Estas funções são chamadas pelas Rotas em web.php
    //função responsável por mostrar a página inicial do site 
    public function index(){
        //chamando todos produtos para a view
        $products = Product::all();

        //mostrar todos produtos que colocamos na variável products
        return view ("welcome",['products'=>$products]);
        
    }

    //função para criação de produtos
    public function create(){
        return view('products.create');
    }

    //função para visualização de produtos
    public function show(){
        //chamando todos produtos para a view
        //$products = Product::all();

        //mostrar todos produtos que colocamos na variável products
        //return view ("products.show",['products'=>$products]);

        $product = Product::all();
        return view('products.show', ['products'=>$product]);
        //return view('products.show',['products'=>$products]);
    }

    //função que permite aceder aos detalhes de um produto
    function detail($id){
        $product = Product::find($id);
        return view ('products.detail',['product'=>$product]);
    }

    //função para pesquisa de produtos
    //request foi importado em cima
    function search(Request $pedido){

        //$auxiliar = request('query');

        $product=Product::
        where('name','like','%'.$pedido->
        input('query').'%')->get();

        return view('search',['products'=>$product]);
    }

    //função responsável por adicionar produtos no carrinho
    function addToCart(Request $pedido){
        $cart = new Cart;
        $user = auth()->user();
        $cart->user_id = $user->id;
        $cart->product_id = $pedido->product_id;
        $cart->save();
        $cart_id=$cart->id;
        return redirect('show');
    }

    //função responsável pelas compras rápidas no sistema
    function quickAddToCart(Request $pedido){
        $cart = new Cart;
        $user = auth()->user();
        $cart->user_id = $user->id;
        $cart->product_id = $pedido->product_id;
        $cart->save();

        return ("Produto comprado");
    }

    //função responsável por contabilizar os produtos no carrinho de determinado cliente
    static function cartItem(){
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do utilizador
        //retornar o total de vezes de objetos 
        //da classe carinho associados a um determinado utilizador
        return Cart::where('user_id',$userId)->count();

    }

    //função responável por ver a lista de produtos no carrinho de determinado cliente
    public function cartList(){
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do 
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products]);
    }

    //função que permite remover produtos do carrinho de compras
    public function removeFromCart($id){
        Cart::destroy($id);
        return redirect("/cartlist");

    }

    //função que permite efetuar compras no sistema
    public function orderNow(){
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do
        
        $totPriceCarrinho= $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');//fazer a soma do preço de todos produtos no carrinho
        
        return view ('ordernow',['totPriceCarrinho'=>$totPriceCarrinho]);
    }

    //função que permite finalizar compra
    public function orderPlace(Request $pedido){
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do
        $allCart = Cart::where('user_id',$userId)->get(); //pegando de novo o carrinho cujo id_user seja igual ao id do utilizador

        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="Pendente";
            $order->payment_method=$pedido->payment;
            $order->payment_status="Pendente";
            $order->address=$pedido->address;

            $order->save();

            Cart::where('user_id',$userId)->delete();//esvaziando o carrinho depois de afectuada compra
        }
        return redirect("/");
    }

    //função responsável por criar novos produtos na loja
    public function store(Request $pedido){
        //instanciação do objeto Product através do Model Product que foi chamado em cima
        $product = new Product;
        
        //atributos do objeto criado
        $product->name = $pedido->name;
        $product->price = $pedido->price;
        $product->category = $pedido->category;
        $product->description = $pedido->description;

        
        //upload da imagem
        if ($pedido->hasFile('gallery') && $pedido->file('gallery')->isValid()){
            //encapsular os dados da imagem em numa variável
            $galleryPedido = $pedido->gallery;
            
            //a extensão da imegem vai receber  o atributo extensão do elemento criande em cima
            $extension = $galleryPedido->extension();

            //no final o nome da imagem será o nome original + mais tempo atual + a extensão
            //tudo fica dentro do md5 para criar uma rash
            $galleryName = md5($galleryPedido->getClientOriginalName().strtotime("now")).".".$extension;

            //guardando a imagem no diretorio do projeto
            $pedido->gallery->move(public_path('img/products'),$galleryName);

            $product->gallery = $galleryName;
        }
        
        $product->save();
        
        return redirect ('show');
    }
    
}
