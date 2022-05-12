<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    //função que permite guardar os formulários feitos no site
    public function store(Request $pedido){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        $form = new Form;

        $form->name = $pedido->name;
        $form->sobrenome = $pedido->sobrenome;
        $form->pais = $pedido->pais;
        $form->provincia = $pedido->provincia;
        $form->endereco = $pedido->endereco;
        $form->sms = $pedido->sms;

        $form->save();

        return view ('welcome',['categories'=>$categories])->with('msg','Producto adicionado na loja!');
    }
	
	//função que permite ter acesso a página de contactos
    public function contact(){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();
        return view ('contact',['categories'=>$categories]);
    }
}
