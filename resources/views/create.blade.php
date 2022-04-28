<!--Extendendo para está página o layout que está em main-->
@extends('layouts.userdashboard')
@section('title','Kitunda - Criar produtos')
@section('content')
<h1 id="products-title">Criação de produtos</h1>
<hr id="linha-horizontal-index">
<div>
    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="gallery">Imagem do Producto:</label>
            <input type="file" name="gallery" id="gallery" class="/form-file"><br><br>
        
            <label>Nome:</label>
            <input type="text" name="name" class="/form-control" id="title" placeholder="Nome"><br><br>

            <label>Preço:</label>
            <input type="text" name="price" class="/form-control" id="title" placeholder="Preço"><br><br>

            <label>Categorias:</label>
            <input type="text" name="category" class="/form-control" id="title" placeholder="Categoria"><br><br>

            <label>Descrição:</label>
            <input type="text" name="description" class="/form-control" id="title" placeholder="Descrição"><br><br>

            <input type="submit" value="Criar">
        </div>
    </form>
</div>
@endsection