@extends('layouts.userdashboard')
@section('title','Kitunda - Ver produtos')
@section('content')

<h1>Delivers Page</h1>

<div class="carousel-inner">
    
    @foreach($delivers as $deliver)
    <div class="">
        <h3>Id do deliver{{$deliver->id}}</h3></a>    
        <h3>Id do produto comprado {{$deliver->order_id}}</h3></a>        
        <h3>Nome do comprador{{$deliver->nome}}</h3></a>      
        <h1></h1> 
    </div>
    @endforeach        
    </div>
@endsection