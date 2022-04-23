@extends('layouts.userdashboard')
@section('title','Kitunda - Carrinho de compras')
@section('content')
<h1>Minhas compras</h1>
<div class="carousel-inner">
    
    @foreach($orders as $pedido)
    <div class="">
        <a href="detail/{{$pedido->id}}">
            <img src="{{$pedido->gallery}}" alt="{{$pedido->name}}">
            <h3>{{$pedido->name}}</h3></a>           
    </div>

    <div class="">
        <h3>Nome: {{$pedido->name}}</h3>     
        <h5>Envio: {{$pedido->status}}</h5> 
        <h5>Endereço: {{$pedido->address}}</h5> 
        <h5>Método de pagamento :{{$pedido->payment_method}}</h5> 
        <h5>Estado do pedido :{{$pedido->payment_status}}</h5>       
    </div>

    @endforeach      
    </div>
@endsection