@extends('layouts.userdashboard')
@section('title','Kitunda - User dashboard')
@section('content')
<h1 id="products-title">Produtos cadastrados na loja</h1>
<hr id="linha-horizontal-index">
<center>
@if(count($products)>0)
    <a href="create" class="btn btn-primary" id="btn-normal">Criar novo produto <ion-icon name="add-outline"></ion-icon></a><br>


<table class="table align-middle mb-0 bg-white" id="product-sistema">
    <thead class="bg-light">
        <tr>
        <th>Name</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
        <td>
            <div class="d-flex align-items-center">
            <img
                src="/img/products/{{$product->gallery}}"
                alt=""
                style="width: 45px; height: 45px"
                class="rounded-circle"
                />
            <div class="ms-3">
                <p class="fw-bold mb-1">{{$product->name}}</p>
                <!--<p class="text-muted mb-0">{{$product->description}}</p>-->
            </div>
            </div>
        </td>
        
        <td>
            <p>{{$product->price}}</p>
        </td>
        <td>
            <p><p>{{$product->category->name}}</p></p>
        </td>
        <td>
        
            <a href="#" class="btn btn-info edit-btn">Editar</a>
            <form action="/products/{{$product->id}}" method="POST">
                @csrf
                @method('Delete')
                <button type="submit" class="btn btn-danger delete-btn">Deletar</button>

            </form>
        </td>
        </tr>
        <tr>
        
        @endforeach
    </tbody>
    
@else
    <p>Não tem produtos no sistema</p>
    <br><a href="detail/{{$product['id']}}" class="btn btn-primary" id="btn-normal">Criar novo produto <ion-icon name="add-outline"></ion-icon></a><br>
@endif

        </tbody>
    </table>
    <br><a href="create" class="btn btn-primary" id="btn-normal2">Criar novo produto <ion-icon name="add-outline"></ion-icon></a><br><br>

    </table>
</center>
@endsection
