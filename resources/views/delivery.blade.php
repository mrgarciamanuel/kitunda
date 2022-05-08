@extends('layouts.main')
@section('title','Kitunda - Ver produtos')
@section('content')
<div id="corpo">
    <h1 id="products-title">Dados de Envio</h1>
    <hr id="linha-horizontal-index">
    <div id="interface">
        <div id="form-product-create">
            <form action="/add_delivery_info" method="POST">
                <div class="form-outline mb-4">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Número do pedido</label>
                        <input type="text" name="order_id" id="gallery" id="form4Example1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nome próprio</label>
                        <input type="text" name="name" id="gallery" id="form4Example1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Apelido</label>
                        <input type="text" name="sobrenome" id="gallery" id="form4Example1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Morada completa</label>
                        <input type="text" name="address" id="gallery" id="form4Example1" class="form-control">

                    <div class="form-group">
                        <label class="form-label">Codigo postal</label>
                        <input type="text" name="post_code" id="gallery" id="form4Example1" class="form-control">
                    </div>

                    <div>
                        <label class="form-label">Província</label>
                        <select name="regions" id="form4Example2" class="form-control">
                            <option value="Bengo">Bengo</option>
                            <option value="Benguela" >Benguela</option>
                            <option value="Bie" >Bié</option>
                            <option value="Cabinda" >Cabinda</option>
                            <option value="Cuando-cugango">Cuando-Cubango</option>
                            <option value="Cunene">Cunene</option>
                            <option value="Huambo">Huambo</option>
                            <option value="Huila">Huíla</option>
                            <option value="Kwanza-sul">kwanza sul</option>
                            <option value="Kwanza-norte">Kwanza Norte</option>
                            <option value="Luanda">Luanda</option>
                            <option value="Lunda-norte">Lunda Norte</option>
                            <option value="Lunda-norte">Lunda Norte</option>
                            <option value="Malanje">Malanje</option>
                            <option value="Moxico">Moxico</option>
                            <option value="Namibe">Namibe</option>
                            <option value="Uige">Uíge</option>
                            <option value="Zaire">Zaire</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Endereço eletrónico</label>
                        <input type="text" name="email" id="gallery" id="form4Example1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Número de telefone</label>
                        <input type="text" name="phone" id="gallery" id="form4Example1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Observações</label><br>
                        <textarea type="address" name="observacoes" id="email" id="gallery" id="form4Example1" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-normal1">Concluir</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

<div id="lateral">
        <img src="/img/delivery3.jpg" class="rounded mx-auto d-block" id="delivery-img" alt="Envio imagem">   
    </div>
@endsection