<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//importar o model de produtos "Responsável por comunicar com a base de dados"
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Favorito;
use App\Models\Order;
use App\Models\Category;

class ProductController extends Controller
{
    //Estas funções são chamadas pelas Rotas em web.php
    //função responsável por mostrar a página inicial do site, a rota /
    public function index(){
        //chamando todos produtos para a view
        //$products = Product::all();
        $products = Product::with('category')->get();

        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        //Retornar a view e mostrar todos produtos que colocamos na variável/objeto products e também as categorias 
        return view ("welcome",['products'=>$products],['categories'=>$categories]);
    }

    //função para criação de produtos
    public function create(){
        return view('products.create');
    }

    //função para visualização de produtos
    public function show(){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        $product = Product::all();//'category' faz referência ao nome da relação criada no Model
        return view('products.show', ['products'=>$product],['categories'=>$categories]);
        //return view('products.show',['products'=>$products]);
    }

    //função que permite aceder aos detalhes de um produto
    function detail($id){

        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        $product = Product::find($id);
        return view ('detail',['product'=>$product],['categories'=>$categories]);
    }

    //função para pesquisa de produtos
    //O obecto request foi importado em cima
    //é responsavel por pegar os dados inseridos pelo utilizador e 
    //comunicar com a base de dados
    function search(Request $pedido){

        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        $product=Product::
        where('name','like','%'.$pedido->
        input('query').'%')->get();

        return view('search',['products'=>$product],['categories'=>$categories]);
    }

    //função responsável por mostrar a página about
    public function about(){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        return view('about',['categories'=>$categories]);
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

    //função responsável por adicionar produtos lista de favoritos  do utilizador
    function addToFavo(Request $pedido){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        
        $favoritos = new Favorito;
        $user = auth()->user();
        $favoritos->user_id = $user->id;
        $favoritos->product_id = $pedido->product_id;
        $favoritos->save();
        return redirect('show');
    }

    //função responsável por mostrar os produtos na lista de favoritos de um cliente
    public function favoList(){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();


        //lista de produtos no carrinho com innerjoin
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do
        $products = DB::table('favoritos')
        ->join('products','favoritos.product_id','=','products.id')
        ->where('favoritos.user_id',$userId)
        ->select('products.*','favoritos.id as cart_id')
        ->get();
        return view ('favolist',['products'=>$products],['categories'=>$categories]);
    }

    //função responsável por realizar compras rápidas no sistema
    function quickAddToCart(Request $pedido){
        $cart = new Cart;
        $user = auth()->user();
        $cart->user_id = $user->id;
        $cart->product_id = $pedido->product_id;
        $cart->save();

        return ("Produto comprado");
    }

    //função responsável por fazer a contagem dos produtos no carrinho de determinado cliente
    static function cartItem(){

        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do utilizador
        //retornar o total de vezes de objetos 
        //da classe carinho associados a um determinado utilizador
        return Cart::where('user_id',$userId)->count();
    }

    //função responável por contabilizar as compras que um cliente já fez na loja
    static function OrderItem(){
        $user = auth()->user();
        $userId = $user->id;

        return Order::where('user_id', $userId)->count();
    }

    //função responável por ver a lista de produtos no carrinho de determinado cliente
    public function cartList(){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do 
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products],['categories'=>$categories]);
    }

    //função que permite remover produtos do carrinho de compras
    public function removeFromCart($id){
        Cart::destroy($id);
        return redirect("/cartlist");
    }

     //função que permite remover produtos do carrinho de compras
     public function removeFromFavo($id){
        Favorito::destroy($id);
        return redirect("/favolist");

    }

    //função que permite efetuar compras no sistema
    public function orderNow(){
        
         //chamando as categoias para que possam ser exibidas no menu
         $categories = Category::all();


        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do
        
        $totPriceCarrinho= $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');//fazer a soma do preço de todos produtos no carrinho
        
        return view ('ordernow',['totPriceCarrinho'=>$totPriceCarrinho], ['categories'=>$categories]);
    }

    //função que permite finalizar compra
    public function orderPlace(Request $pedido){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

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
        return redirect("/delivery", ['categories'=>$categories]);
    }
    
    //Função que permite mostrar as compras feitas por um utilizador
    //para tal, é necessário fazer join entre as tablelas orders e produtos
    public function myOrders(){
        
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do
       $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();

        //return ("Feito");
        return view('myorders',['orders'=>$orders]);

    } 

    //funcção responsável por mostrar ao admin os produtos cadastrados no sistema
    public function productlist(){
        $user = auth()->user();
        //$products = $user->products;
        $products = Product::all();
        return view ("productlist",['products'=>$products]); 
    }

    //função responsável por deletar produtos no sistema
    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect('productlist')->with('msg','Produto excluido');
    }

    //função responsável por criar novos produtos na loja
    public function store(Request $pedido){
        //instanciação do objeto Product através do Model Product que foi chamado em cima
        $product = new Product;
        
        //atributos do objeto criado
        $product->name = $pedido->name;
        $product->price = $pedido->price;
        $product->description = $pedido->description;
        $product->category_id = $pedido->category_id;

        
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
        
        //retornando a view de produtos e uma flash sms
        return redirect ('productlist')->with('msg','Producto adicionado na loja!');
    }
    
}
