<?php
    use Illuminate\Http\Request;
?>
@extends('layouts.main')
@section('title','Kitunda - Ver produtos')
@section('content')
    <h1>Pesquisa de produtos</h1>
    <!--Container de produtos-->
    <div class="col-md-12" id="product-container">
        <div class="row" id="cards-container">
        <h1>Pesquisou por : bla bla bla</h1>
            @foreach($products as $product)
            <div class="card col-md-3"> 
                    <img class="#" src="{{$product['gallery']}}">
                    <div class="card-body" id="card-body-product">
                        <h4 class="#">{{$product['name']}}</h4>
                        <p>{{$product['description']}}</p>
                        <p>{{$product['price']}},00 AOA </p>
                    </div>
                
                    <br><a href="products/detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal">Adicionar <ion-icon name="cart-outline" size="small"></ion-icon></a><br>
                    <a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal2">Ver mais</a>
            </div>
            @endforeach
        </div>
    </div>
@endsection