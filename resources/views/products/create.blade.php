<!--Extendendo para está página o layout que está em main-->
@extends('layouts.userdashboard')
@section('title','Kitunda - Criar produtos')
@section('content')
<h1>Criação de produtos</h1>
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
            <label>Categoria</label>
            <select name="category_id">
                <option disabled>Alimentares</option>
                <option value="1">Cereais</option>
                <option value="2">Farinha</option>
                <option value="3">Feijões</option>
                <option value="4">Tuberculos</option>
                <option value="5">Frutas</option>
                <option value="6">Legumes</option>
                <option disabled>Não alimentares</option>
                <option value="7">Tecnologia agricola</option>
                <option value="8">Fitofarmacêuticos</option>
                <option value="9">Sementes</option>
                <option value="10">Adubos</option>
            </select><br><br>

            <label>Descrição:</label>
            <input type="text" name="description" class="/form-control" id="title" placeholder="Descrição"><br><br>

            <input type="submit" value="Criar">
        </div>
    </form>
</div>
@endsection