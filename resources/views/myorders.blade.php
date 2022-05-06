<?php
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Auth;
    //se o utilizador não estiver autenticado, 
    //o carrinho estará sempre zerado 
    $totalShoped = 0;

    //se o utilizador estiver logado, será exibido o
    //número de produtos no seu carrinho
    if ($user = auth()->user()){
        $totalShoped = ProductController::OrderItem();
    }
?>
@extends('layouts.userdashboard')
@section('title','Kitunda - Carrinho de compras')
@section('content')
<h1 id="products-title">Minhas compras</h1>
<hr id="linha-horizontal-index">

<div id="corpo">
    
    <div id="interface">

    <!-- Caso o utilizador não tenha efetuado ainda nenhuma compra no sistema -->
    @if($totalShoped == 0)
        <center><img src="/img/user_no_photo_.png" class="img-fluid" id="no-user-photo"></center>
        <h4 id="products-title">Ainda não efetuou nenhuma compra no Kitunda, Vá até a <a href="/show" id="links">nossa loja</a> e efetue a sua primeira compra</h4>
    @else
    
        <table class="table">
            <thead class="bg-light">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Pagamento</th>
                    <th>Dados de envio</th>
                </tr>
            </thead>
        

        <tbody>
            @foreach($orders as $pedido)
            <tr>
                <td>
                    <p>{{$pedido->id}}</p>
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <img
                            src="/img/products/{{$pedido->gallery}}"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                            />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">{{$pedido->name}}</p>
                                
                        </div>
                    </div>
                </td>
                <td>
                    <p>{{$pedido->status}}</p>
                </td>
                <td>
                    <p>{{$pedido->payment_method}}</p>
                </td>

                <td>
                    <a href="#" id="links">Seguir envio!</a>
                </td>
            </tr>
            
            @endforeach
        </tbody> 
        </table>
    @endif     
    </div>
    <div id="lateral">
        <img src="/img/manwitdmobile.jpg" class="rounded mx-auto d-block" alt="...">
        <h2 id="products-title">Seu histórico de compras no Kitunda!</h2>
        <hr id="linha-horizontal-index">
    </div>
</div>
@endsection