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

        $user = auth()->user();

        $form = new Form;

        $form->name = $pedido->name;
        $form->sobrenome = $pedido->sobrenome;
        $form->pais = $pedido->pais;
        $form->provincia = $pedido->provincia;
        $form->endereco = $pedido->endereco;
        $form->sms = $pedido->sms;
        $form->user_id = $user->id;

        $form->save();
        return view ('contact',['categories'=>$categories])->with('msg','A sua mensagem foi enviada com sucesso!');
    }
	
	//função que permite ter acesso a página de contactos
    public function contact(){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();
        return view ('contact',['categories'=>$categories]);
    }
}
