<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//importar o model de produtos "Responsável por comunicar com a base de dados"
use App\Models\Product;

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
    static function cartItem(){
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do utilizador
        //retornar o total de vezes de objetos 
        //da classe carinho associados a um determinado utilizador
        return Cart::where('user_id',$userId)->count();

    }
}
