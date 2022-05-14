<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //função que permite mostar a dashboard do utilizador com os seus dados
    public function dashboard(){
        $user = auth()->user();
        return view ('dashboard',['user'=>$user]);
    }

    //
    public function edituser(){
        $user = auth()->user();
        return view ('edituser',['user'=>$user]);
    }

    public function updateUser(Request $pedido){
        User::findOrFail($pedido->id)->update($pedido->all());
        return redirect('dashboard')->with('msg','Dados do utilizador foram atualizados!');
    }

}
