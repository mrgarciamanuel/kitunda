@extends('layouts.userdashboard')
@section('title','Kitunda - User dashboard')
@section('content')
<h1>Produtos cadastrados na loja</h1>

@if(count($products)>0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preco</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>    
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td scropt="row">{{$loop->index +1}}</td> 
                    <td><a href="detail/{{$product->id}}">{{$product->name}}</a></td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category}}</td>
                    <td>
                        <a href="#" class="btn btn-info edit-btn">Editar</a>
                        <form action="/products/{{$product->id}}" method="POST">
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-danger delete-btn">Deletar</button>

                        </form>
                    </td>
                </tr>
            @endforeach
            <br><a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal">Criar novo produto <ion-icon name="add-outline"></ion-icon></a><br>
@else
    <p>Não tem produtos no sistema</p>
    <br><a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal">Criar novo produto <ion-icon name="add-outline"></ion-icon></a><br>
@endif

        </tbody>
    </table>
    <br><a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal2">Criar novo produto <ion-icon name="add-outline"></ion-icon></a><br><br>
@endsection
