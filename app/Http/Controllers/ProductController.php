<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//importar o model de produtos "Responsável por comunicar com a base de dados"
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

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

    function addToCart(Request $pedido){
        $cart = new Cart;
        $user = auth()->user();
        $cart->user_id = $user->id;
        $cart->product_id = $pedido->product_id;
        $cart->save();
        return redirect('show');
    }

    function quickAddToCart(Request $pedido){
        $cart = new Cart;
        $user = auth()->user();
        $cart->user_id = $user->id;
        $cart->product_id = $pedido->product_id;
        $cart->save();

        return ("Produto comprado");
    }

    static function cartItem(){
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do utilizador
        //retornar o total de vezes de objetos 
        //da classe carinho associados a um determinado utilizador
        return Cart::where('user_id',$userId)->count();

    }

    public function cartList(){
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do 
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*')
        ->get();
        return view('cartlist',['products'=>$products]);
    }

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
