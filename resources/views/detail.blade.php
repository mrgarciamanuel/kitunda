<!--Extendendo para está página o layout que está em main-->
@extends('layouts.main')
@section('title','Kitunda - Productos')
@section('content')
<br>
<center>
  <br>
<div class="card mb-3" style="max-width: 1100px; max-height: 1000px" id="card-prod-detail">
  <div class="row g-0">
    <div class="col-md-4" id="b">
      <img src="/img/products/{{$product->gallery}}" class="img-fluid rounded-start" id="kitundaperson" alt="Kitunda">
    </div>
    <div class="col-md-8" id="product-detail-elements">
      <div class="card-body">
        <h2 class="card-title">{{$product['name']}}</h2>
        <h5>Qtd: 1 Kg</h5>
        <h5 id="product-title-detail">{{$product['description']}}</h5>
        <h5>Categoria: {{$product->category->name}}</h5>
        <a href="$"><ion-icon name="heart" size="small" id="icones-detail"></ion-icon></a>
          <a href="#"><ion-icon name="chatbox-outline" size="small" id="icones-detail"></ion-icon></a>
        
        <form action="/add_to_cart" method="POST">
          @csrf
          <input type="hidden" name="product_id" value="{{$product['id']}}">
          
          <button class="btn btn-primary" id="btn-normal">Adicionar no carrinho</button><br>
        </form>
        <button class="btn btn-primary" id="btn-normal2">Comprar agora</button>
        <br><br><br><a href="/show">Voltar</a>
            
    </div>
    </div>
  </div>
</div>
</center>

@endsection