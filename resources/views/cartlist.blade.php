<?php
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Auth;
    //se o utilizador não estiver autenticado, 
    //o carrinho estará sempre zerado 
    $total = 0;

    //se o utilizador estiver logado, será exibido o
    //número de produtos no seu carrinho
    if ($user = auth()->user()){
    $total = ProductController::cartItem();
    }
?>
<!--Extendendo para está página o layout que está em main-->
@extends('layouts.main')
@section('title','Kitunda - Carinho')
@section('content')

<!-- caso o carrinho estiver vazio-->
@if($total==0)
    <h4 id="products-title">Seu carrinho de compras está vázio, <a href="/show">clique aqui</a> para ver a nossa ementa</h4>
@else
<center>
    <div class="carousel-inner">
        <div>
            <div>
                <h1 id="products-title">Carinho de compras</h1>
                <hr id="linha-horizontal-index">
                <a href="/ordernow" class="btn btn-primary" id="btn-normal1"> Finalizar compra</a><br><br>
                <table class="table align-middle mb-0 bg-white" id="product-sistema">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Imagem</th>
                            <th>Preço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)            
                        <tr>
                            <td>
                                <div class="">
                                <p class="fw-bold mb-1">{{$product->name}}</p>             
                                </div>
                            </td>

                            <td>
                                <div class="">
                                    <img
                                    src="/img/products/{{$product->gallery}}"
                                    alt=""
                                    style="width: 170px; height: 170px"
                                    class="rounded-circles"
                                    />            
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <p class="fw-bold mb-1">{{$product->price}}</p>             
                                </div>
                            </td>

                            <td>
                                <div class="">
                                    <a href="/remove_from_cart/{{$product->cart_id}}" class="btn btn-danger">Remover do carrinho</a>             
                                </div>
                            </td>
                        </tr>
                
                        @endforeach 
                </tbody>
                </table>
                <a href="/ordernow" class="btn btn-primary" id="btn-normal1"> Finalizar compra</a><br><br>
                
            </div>
        </div>      
    </div>
</center>
@endif
@endsection