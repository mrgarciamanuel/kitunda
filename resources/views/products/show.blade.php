<!--Extendendo para está página o layout que está em main-->
@extends('layouts.main')
@section('title','Kitunda - Productos')
@section('content')
<center>    
    <div id="carouselExampleCaptions"  class="carousel slide w-100" id="carrousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner" id="carousel-inner-prod">
            @foreach($products as $product)
                <div class="carousel-item {{$product['id']==1?'active':''}}">
                <a href="detail/{{$product['id']}}">
                <img class=""  src="/img/products/{{$product->gallery}}" id="img-carousel" alt="{{$product['nome']}}">
                    <div class="carousel-caption d-none d-md-block" id="caption-img">
                        <h3>{{$product['name']}}</h3>
                        <h4>Descrição {{$product['description']}}</h4>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</center>

    <!--Container de produtos-->
    <div class="col-md-12" id="product-container">
        <div class="row" id="cards-container">
            @foreach($products as $product)
            <div class="card col-md-3"> 
                    <img class="#" src="/img/products/{{$product->gallery}}">
                    <div class="card-body" id="card-body-product">
                        <h4 class="#">{{$product['name']}}</h4>
                        <h6>{{$product['category_id']}}</h6>
                        <p>{{$product['description']}}</p>
                        <p>{{$product['price']}},00 AOA </p>
                    </div>
                    
                    <br><a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal">Adicionar <ion-icon name="cart-outline" size="small"></ion-icon></a><br>
                    <a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal2">Ver mais</a>
            </div>
            @endforeach
        </div>
    </div>
    
@endsection