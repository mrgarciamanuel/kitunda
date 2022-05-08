<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{    
    //função responsável por mostrar as categorias de produtos no sistema 
    public function category(){

        $categories = Category::all();
        return view('category',['categories'=>$categories]);
    }

    //função responsável por mostrar os produtos que estão em uma categoria
    //para tal, o id da categoria é passado por parametro, e de seguida é enviado para a view os produtos que pertencem a cetegoria requerida pelo utilizador.
    //A variavél/objeto 'products' criado dentro desta função vai receber a função que faz a relação entre as tabelas como foi definido nos Models
    public function category_products($id){
        $products = Category::find($id)->products()->get();
        $categories = Category::all();
        return view ('category_prod',['products'=>$products], ['categories'=>$categories]);
    }
}
