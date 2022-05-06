@extends('layouts.userdashboard')
@section('title','Kitunda - Perfil de utilizador')
@section('content')
<h2 id="products-title">Desfrute dos benefícios de ser um membro da familia Kitunda!</h2>
<hr id="linha-horizontal-index">

<div id="corpo">
    <div id="interface">
        <img src="/img/homemrindo.jpg" class="rounded mx-auto d-block" alt="Kitunda"><br>
    </div>

    
    <div id="lateral">
        <center>
        <div class="card" style="width: 30rem;">
            <center><img src="/img/user.png" class="card-img-top" id="no-user-photo" alt="{{$user->name}}"></center>
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Genero: {{$user->email}}</li>
                <li class="list-group-item">Email: {{$user->email}}</li>
                <li class="list-group-item">Morada: {{$user->email}}</li>
                <li class="list-group-item">Telefone: {{$user->email}}</li>
            </ul>
            <div class="card-body">
                <a href="edituser/{{$user->id}}" class="btn btn-primary" id="btn-normal1">Editar dados</a>
            </div>
        </div><br>
    </center>

    </div>
</div>

@endsection
