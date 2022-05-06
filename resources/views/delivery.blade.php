@extends('layouts.main')
@section('title','Kitunda - Ver produtos')
@section('content')
    <h1>Dados de envio da encomenda </h1>

    <form action="/add_delivery_info" method="POST">
        @csrf

        <div class="form-group">
            <label>Número do pedido</label>
            <input type="text" name="order_id" placeholder="Numero do pedido">
        </div>

        <div class="form-group">
            <label>Nome próprio</label>
            <input type="text" name="name" placeholder="Garcia">
        </div>

        <div class="form-group">
            <label>Apelido</label>
            <input type="text" name="sobrenome" placeholder="Manuel">
        </div>

        <div class="form-group">
            <label>Morada completa</label>
            <input type="text" name="address" placeholder="Rua de camões 60, 4710-362">

        <div class="form-group">
            <label>Codigo postal</label>
            <input type="text" name="post_code" placeholder="4710-362">
        </div>

        <div>
            <label>Província</label>
            <select name="regions">
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
            <label>Endereço eletrónico</label>
            <input type="text" name="email" placeholder="pessoa@ucp.pt">
        </div>

        <div class="form-group">
            <label>Número de telefone</label>
            <input type="text" name="phone" placeholder="92000000">
        </div>

        <div class="form-group">
            <label>Observações</label><br>
            <textarea type="address" name="observacoes" placeholder="Indica aqui alguns pontos ou observações que queira que levemos enconta durante o tratamento da sua encomenda" id="email">a</textarea>
        </div>
        <button type="submit" class="btn btn-default">Concluir</button>
    </form>
@endsection