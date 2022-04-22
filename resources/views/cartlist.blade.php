<!--Extendendo para está página o layout que está em main-->
@extends('layouts.main')
@section('title','Kitunda - Carinho')
@section('content')

<div class="carousel-inner">
    <div>
        <div>
            <h3>Carinho de compras</h1>
            @foreach($products as $product)
            <div class="">
                <div class="col-sm-3">
                <a href="detail/{{$product->id}}">
                        <img src="doce_batata1.jpg" alt="{{$product->name}}">
                    </a>
                </div>

                <div class="">
                        <h3>{{$product->name}}</h3>
                        <h4>{{$product->price}}</h4>
                </div>

                <div class="col-sm-3">
                    <a href="/remove_from_cart/{{$product->cart_id}}">Retirar do cesto</a><br><br>
                </div>
            @endforeach 
        </div>
    </div>      
</div>

@endsection