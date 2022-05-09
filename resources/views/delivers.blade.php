@extends('layouts.userdashboard')
@section('title','Kitunda - Ver produtos')
@section('content')

<h1 id="products-title">Seus envios</h1>
<hr id="linha-horizontal-index">

<div class="carousel-inner">
    <table class="table">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Product ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Codigo postal</th>
                <th>Telefone</th>
                <th>Região</th>
                <th>Observation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($envios as $envio)
            <tr>
                <td>
                    <h6>{{$envio->id}}</h6></a>
                </td>
                <td>
                    <h6>{{$envio->product_id}}</h6></a>
                </td>
                <td>
                    <h6>{{$envio->nome}}</h6></a>
                </td>
                <td>
                    <h6>{{$envio->address}}</h6></a>
                </td>
                <td>
                    <h6>{{$envio->post_code}}</h6></a>
                </td>
                <td>
                    <h6>{{$envio->phone}}</h6></a>
                </td>
                <td>
                    <h6>{{$envio->region}}</h6></a>
                </td>
                <td>
                    <h6>{{$envio->observation}}</h6></a>
                </td>
            </tr>
            @endforeach 
        </tbody>    
    </table>   
</div>
@endsection