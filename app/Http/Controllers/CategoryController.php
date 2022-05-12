<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\ProductController;

use Illuminate\Http\Request;

class CategoryController extends Controller
{    
    //função responsável por mostrar as categorias de produtos no sistema 
    public function category(){
        $products = Product::with('category')->get(); 
        $categories = Category::all();
        return view('category',['categories'=>$categories],['products'=>$products]);
    }

    //função responsável por mostrar os produtos que estão em uma categoria
    //para tal, o id da categoria é passado por parametro, e de seguida é enviado para a view os produtos que pertencem a cetegoria requerida pelo utilizador.
    //A variavél/objeto 'products' criado dentro desta função vai receber a função que faz a relação entre as tabelas como foi definido nos Models
    public function category_products($id){
        //variavel/objeto products que recebe todos os produtos de uma categoria cujo 'id' é passado na função como parametro 
        $products = Category::find($id)->products()->get();

        //tendo acesso as categorias para os poder visualizar no menu principal do site
        $categories = Category::all();
        return view ('category_prod',['products'=>$products], ['categories'=>$categories]);
    }
}
