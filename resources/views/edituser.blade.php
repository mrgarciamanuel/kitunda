@extends('layouts.userdashboard')
@section('title','Kitunda - Carrinho de compras')
@section('content')

<h2 id="products-title">Desfrute dos benefícios de ser um membro da familia Kitunda!</h2>
<hr id="linha-horizontal-index">
<div id="corpo">
    <div id="interface">
        <img src="/img/homemrindo.jpg" class="rounded mx-auto d-block" alt="Kitunda"><br>
    </div>

    <div id="lateral">
        <div id="form-product-create">
            <form action="/edituser/{{$user->id}}" method="post">
                <div class="form-outline mb-4">
                    @csrf <!--Cross-site forgeries é um a diretiva do laravel que protege o site de explorações maliciosas através do qual comandos são executados em nome de um utilizador autenticado -->
                    @method('PUT')
                    <h2>Editar dados de {{$user->name}}</h2>
                    <div>
                        <label class="form-label">Nome</label>
                        <input type="text" name="name" id="form4Example2" class="form-control"  value="{{$user->name}}">
                    </div>

                    <div>
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" id="form4Example2" class="form-control"  value="{{$user->email}}">
                    </div>

                    <div>
                        <label class="form-label">Provincia</label>
                        <input type="text" name="province" id="form4Example2" class="form-control"  value="{{$user->province}}">
                    </div>

                    <div>
                        <label class="form-label">Endereço</label>
                        <input type="text" name="morada" id="form4Example2" class="form-control"  value="{{$user->morada}}">
                    </div>

                    <div>
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone" id="form4Example2" class="form-control"  value="{{$user->telefone}}">
                    </div>

                    <input type="submit" class="btn btn-primary btn-block mb-4" id="btn-normal1" value="Utualizar">  
                </div>         
            </form>
        </div>
    </div>
</div>
@endsection