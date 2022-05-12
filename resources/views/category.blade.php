@extends('layouts.main')
@section('title','Kitunda')
@section('content')

<h2 id="cat-title">Categorias</h2>
<div>
    <div id="category-left-side">
        @foreach($categories as $category)
            <h3><a href="category/{{$category['id']}}">{{$category->name}}</a></h3>
        @endforeach    
    </div>


    <div id="category-right-side" id="category-container">
        <h1 id="products-title">Explore os nossos produtos</h1>
        <hr id="linha-horizontal-index">
            <div class="row">
            @foreach($products as $product)
                <div class="card col-md-4" >             
                        <div class="card-body">
                            <h5 class="card-title">{{$product['name']}}</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>

                </div>
            @endforeach
            </div>
            
    </div>
</div>
@endsection