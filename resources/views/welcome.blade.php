<!--Extendendo para está página o layout que está em main-->
@extends('layouts.main')
@section('title','Kitunda')
@section('content')
 <!--Carrousel-->
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="/img/8.jpg" class="d-block1 w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="slogan">CONSTRUINDO OPORTUNIDADES ALÉM FRONTEIRAS</h1>
                            <a href="/category" class="btn btn-primary btn-lg" id="banner-btn1">COMPRE AGORA</a>
                            <a href="/show" class="btn btn-primary btn-lg" id="banner-btn2">DESCUBRA AS NOSSAS OFERTAS</a>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="/img/5.1.jpg" class="d-block1 w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="slogan">CONSTRUINDO OPORTUNIDADES ALÉM FRONTEIRAS</h1>
                            <a href="/category" class="btn btn-primary btn-lg" id="banner-btn1">COMPRE AGORA</a>
                            <a href="/show" class="btn btn-primary btn-lg" id="banner-btn2">DESCUBRA AS NOSSAS OFERTAS</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                    <img src="/img/10.1.jpg" class="d-block1 w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="slogan">CONSTRUINDO OPORTUNIDADES ALÉM FRONTEIRAS</h1>
                        <a href="/category" class="btn btn-primary btn-lg" id="banner-btn1">COMPRE AGORA</a>
                        <a href="/show" class="btn btn-primary btn-lg" id="banner-btn2">DESCUBRA AS NOSSAS OFERTAS</a>
                    </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
                <!--FIm do carrousel-->

                <div class="col-md-12" id="product-container">
        
     <!--Container de produtos-->

    <h1 id="products-title">Nossos produtos</h1>
    <hr id="linha-horizontal-index">
        <div class="row" id="cards-container">
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

@endsection