<?php

namespace App\Http\Controllers;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Category;


class DeliveryController extends Controller
{
    //função que permite aceder a view delivery
    public function delivery(){
        //chamando as categoias para que possam ser exibidas no menu
        $categories = Category::all();

        return view('delivery',['categories'=>$categories]);
    }
    //função que permite adicionar dados do pedido
    public function addDeliveryInfo(Request $pedido){
        //instanciação do objeto Delivery através do Model Delivery que foi chamado em cima
        $delivery = new Delivery;

        //atributos do objeto criado
        $delivery->nome = $pedido->name;
        $delivery->sobrenome = $pedido->sobrenome;
        $delivery->order_id = $pedido->order_id;
        $delivery->address = $pedido->address;
        $delivery->post_code = $pedido->post_code;
        $delivery->region = $pedido->regions;
        $delivery->email = $pedido->email;
        $delivery->phone = $pedido->phone;
        $delivery->observation = $pedido->observacoes;

        //salvando os dados na base de dados, todo objeto criado em laravel, por omissão tem um metodo save()
        $delivery->save();
        return redirect ('/');
    }

    public function showDelivers(){
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel userId recebe o identificador do
        
        //Filtrando os dados com join
        $user = auth()->user();//verificar autentificação do utilizador
        $userId = $user->id;//variavel/objeto userId recebe o identificador do
        $envios = DB::table('orders')
        ->join('deliveries','orders.id','=','deliveries.order_id')
        ->where('orders.user_id',$userId)
        ->get();

        return view('delivers',['envios'=>$envios]);
        //Filtrando os dados com as relations via Eloquent
       //$envios = Delivery::find(1)->order;
        //(return view ('delivers',['envios'=>$envios]);
              
        //A grande diferença consiste no facto de que via Eloquent conseguimos ter acesso aos dados de ambas as tabelas na view 
    }
}
