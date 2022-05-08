<?php
    use Illuminate\Http\Request;
    use App\Http\Controllers\ProductController;
?>
@extends('layouts.main')
@section('title','Kitunda - Ver produtos')
@section('content')
    <h2 id="products-title">Pesquisa de produtos</h2>
    <hr id="linha-horizontal-index">
    <!--Container de produtos-->
    <div class="col-md-12" id="product-container">
        <div class="row" id="cards-container">
            @foreach($products as $product)
            <div class="card col-md-3"> 
                    <img class="#" src="/img/products/{{$product->gallery}}">
                    <div class="card-body" id="card-body-product">
                        <h4 class="#">{{$product['name']}}</h4>
                        <p>{{$product['description']}}</p>
                        <p>{{$product['price']}},00 AOA </p>
                    </div>
                
                    <center>
                        <a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal">Ver detalhes <ion-icon name="clipboard-outline"></ion-icon></a><br>

                        <form action="/quick_add_to_cart" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product['id']}}">

                            <button class="btn btn-primary" id="btn-normal1">Comprar agora<ion-icon name="cart-outline" size="small"></ion-icon><i class="bi bi-apple"></i></button>
                        </form>
                    </center>
            </div>
            @endforeach
        </div>
    </div>
@endsection