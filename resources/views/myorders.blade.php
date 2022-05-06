@extends('layouts.userdashboard')
@section('title','Kitunda - Carrinho de compras')
@section('content')
<h1 id="products-title">Minhas compras</h1>
<hr id="linha-horizontal-index">

<div id="corpo">
    <div id="interface">
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
                    <a href="#">Seguir envio!</a>
                </td>
            </tr>
            
            @endforeach
        </tbody> 
        </table>     
    </div>
    <div id="lateral">
        <img src="/img/manwitdmobile.jpg" class="rounded mx-auto d-block" alt="...">
        <h2 id="products-title">Seu histórico de compras no Kitunda!</h2>
        <hr id="linha-horizontal-index">
    </div>
</div>
@endsection