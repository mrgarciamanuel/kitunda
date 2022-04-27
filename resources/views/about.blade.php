@extends('layouts.main')
@section('title','Kitunda - Productos')
@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner" id="carousel-inner-prod">
    <div class="carousel-item active">
      <img src="/img/team1.jpg" class="d-block w-100" alt="Kitunda">
    </div>
    <div class="carousel-item">
      <img src="/img/team2.jpg" class="d-block w-100" alt="Kitunda">
    </div>
    <div class="carousel-item">
      <img src="/img/team3.jpg" class="d-block w-100" alt="Kitunda">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<h1 id="products-title">Sobre o Kitunda</h1>
<hr id="linha-horizontal-index">
<div class="card mb-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Quem somos</h5>
    <p class="card-text">O Kitunda é o primeiro Marketplace para empresas do sector agroalimentar em Angola. indústria transformadora e de tecnologia agrícola, permitindo a interação entre fornecedores e consumidores, a promoção, compra e venda dos seus produtos num mercado global.
Com uma estrutura B2C, espera-se corresponder à procura do consumidor angolano de produtos do sector agroalimentar.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Nossa missão</h5>
    <p class="card-text">Construir oportunidades, além-fronteira. Comprometendo-se a levar a melhor experiência de compra e venda de bens e serviços, criando uma ponte para ter acesso ao impossível.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
  <img src="..." class="card-img-bottom" alt="...">
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Nossa visão</h5>
    <p class="card-text">Construir oportunidades, além-fronteira. Comprometendo-se a levar a melhor experiência de compra e venda de bens e serviços, criando uma ponte para ter acesso ao impossível.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
  <img src="..." class="card-img-bottom" alt="...">
</div>

<h1 id="products-title">Conheça a nossa equipa</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="/img/myself.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
</div>

@endsection