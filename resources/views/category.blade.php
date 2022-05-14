@extends('layouts.main')
@section('title','Kitunda')
@section('content')

    <div id="corpo">
    <h1 id="products-title">Explore os nossos produtos</h1>
    <hr id="linha-horizontal-index">

    <div id="category-left-side">
        <!--Inicio do formulário da pesquisa de produtos-->
        <form action="search" class="d-flex">
            <input class="form-control me-2" id="search-cat" name="query" type="search" placeholder="Procurar produtos" aria-label="Search">
            <button class="btn btn-outline-success" id="category-btn" type="submit">Pesquisar</button>
        </form> 
        <!--Fim do formulário da pesquisa de produtos-->
        <h4 id="cat-title">Categorias</h4><br>
        @foreach($categories as $category)
            <h6><a href="category/{{$category['id']}}" id="category-items">{{$category->name}}</a></h6>
        @endforeach    
    </div>

    <div id="category-right-side" id="category-container">
            <div class="row">
                @foreach($products as $product)
                <div class="card col-md-4"> 
                    <img class="#" id="img-prod-item" src="/img/products/{{$product->gallery}}">
                    <div class="card-body" id="card-body-product">
                        <h4 class="#">{{$product['name']}}</h4>
                        <h6>{{$product->category->name}}</h6>
                        <p>{{$product['description']}}</p>
                        <p>{{$product['price']}},00 AOA </p>

                        <form action="/add_to_favo" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                            <button id="button-hidden-welcome"><ion-icon name="heart" size="small" id="icones-detail"></ion-icon></button>
                        </form>                     
                        
                    </div>
                    <center>
                    <a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal">Ver detalhes <ion-icon name="clipboard-outline"></ion-icon></a><br>
                    
                    <form action="/quick_add_to_cart" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product['id']}}">
                        <button class="btn btn-primary" id="btn-normal1" hidden>Comprar agora<ion-icon name="cart-outline" size="small"></ion-icon><i class="bi bi-apple"></i></button>
                    </form>
                    
                    </center>
            </div>
                @endforeach
            </div>
    </div>
</div>
@endsection