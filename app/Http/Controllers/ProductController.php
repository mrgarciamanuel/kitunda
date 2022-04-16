<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//importar o model de produtos "Responsável por comunicar com a base de dados"
use App\Models\Product;

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
        //$cart = new Cart();
        //$user = auth()->user();
        //$cart->user_id = $user->id;
        //$cart->user_id = $product->id;
        
        /*if ($pedido->session()->has('user')){
            return "Done!";
        }else{
            return redirect ('/login');
        }
        */
    }
}
