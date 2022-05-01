<!--Extendendo para está página o layout que está em main-->
@extends('layouts.userdashboard')
@section('title','Kitunda - Criar produtos')
@section('content')
<h1 id="products-title">Criação de produtos</h1>
<hr id="linha-horizontal-index">
<div id="corpo">

    <div id="interface">
        <div id="form-product-create">
            <form action="/products" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-outline mb-4">
                    <label for="gallery" class="form-label">Imagem do Producto:</label>
                    <input type="file" name="gallery" id="gallery" id="form4Example1" class="form-control"><br>
                
                    <label class="form-label">Nome:</label>
                    <input type="text" name="name" id="form4Example2" class="form-control" placeholder="Nome"><br>

                    <label class="form-label">Preço:</label>
                    <input type="text" name="price" id="form4Example2" class="form-control" placeholder="Preço"><br>

                    <label>Categoria</label><br>
                    <select name="category_id" id="form4Example2" class="form-control">
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
                    </select><br>

                    <label class="form-label">Descrição:</label>
                    <input type="text" name="description" id="form4Example2" class="form-control" placeholder="Descrição"><br>

                    <input type="submit" class="btn btn-primary btn-block mb-4" id="btn-normal1" value="Criar">
                </div>
            </form>
        </div>
    </div>

    <div id="lateral">
        <img src="/img/agrofood.jpg" class="rounded mx-auto d-block" alt="...">
        <h2 id="products-title">Produtos naturais, frescos e acabados de tirar do campo!</h2>
        <hr id="linha-horizontal-index">
    </div>
</div>
@endsection