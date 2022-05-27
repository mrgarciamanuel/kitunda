<!--Extendendo para está página o layout que está em main-->
@extends('layouts.main')
@section('title','Kitunda - Productos')
@section('content')
<center>    
    <div id="carouselExampleCaptions"  class="carousel slide w-100" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" id="indicador-carousel1" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" id="indicador-carousel2" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" id="indicador-carousel3" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner" id="carousel-inner-prod">
            @foreach($products as $product)
                <div class="carousel-item {{$product['id']==1?'active':''}}">
                    <a href="detail/{{$product['id']}}">
                        <img class=""  src="/img/products/{{$product->gallery}}" id="img-carousel" alt="{{$product['nome']}}">
                    </a>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</center>
<hr id="linha-horizontal-show">
    <!--Container de produtos-->
    <div class="col-md-12" id="product-container">
        <div class="row" id="cards-container">
            @foreach($products as $product)
            <div class="card col-md-3"> 
                    <img class="#" id="kitundaperson" src="/img/products/{{$product->gallery}}">
                    <div class="card-body" id="card-body-product">
                        <h4 class="#">{{$product['name']}}</h4>
                        <h6>{{$product['category->name']}}</h6>
                        <p>{{$product['description']}}</p>
                        <p>{{$product['price']}},00 AOA </p>

                        <form action="/add_to_favo" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                            <button id="button-hidden-welcome"><ion-icon name="heart" size="small" id="icones-detail"></ion-icon></button>
                    </form>
                    
                    </div>

                    
                    <center>
                    <br><a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal" hidden>Adicionar <ion-icon name="cart-outline" size="small"></ion-icon></a><br>
                    <a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal2">Ver mais</a></center><br>
            </div>
            @endforeach
        </div>
    </div>
    
@endsection