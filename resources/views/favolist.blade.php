@extends('layouts.main')
@section('title','Kitunda - Favoritos')
@section('content')

<h1 id="products-title">Sua Lista de favoritos</h1>
<hr id="linha-horizontal-index">
<div class="carousel-inner">
    <center>
        <table class="table align-middle mb-0 bg-white" id="product-sistema">
            <thead class="bg-light">
                <tr>
                <th>Name</th>
                <th>Categoria</th>
                <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                <div class="d-flex align-items-center">
                    <img
                        src="/img/products/{{$product->gallery}}"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="">
                        <p class="fw-bold mb-1">{{$product->name}}</p> 
                                    
                    </div>
                </td>
                <td>
                    <p>{{$product->category_id}}</p>
                </td>

                <td>
                    <a class="btn btn-primary" href="detail/{{$product->id}}">Ver detalhes</a><br><br>
                </td>    
            </tr>
            @endforeach 
        </table>
    </center>
</div>

@endsection