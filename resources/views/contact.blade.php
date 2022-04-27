<!--Extendendo para está página o layout que está em main-->
@extends('layouts.main')
@section('title','Kitunda')
@section('content')
<div id="corpo">
    <!-- INÍCIO FORMULÁRIO-->
    <div id="interface">
        <div class="container">
        <!-- INÍCIO CARTÃO-->
            <br>
            <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/person2.jpg" class="img-fluid rounded-start" alt="kitunda" id="kitundaperson">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">KITUNDA</h5>
                                <p class="card-text">Kitunda é projeto de e-commerce voltado a venda de produtos agroalimentares, desenvolvido por estudantes da Universidade Católica Portuguesa de Braga</p>

                                <h6>Entre em contacto com a nossa equipa</h6>
                                <p><ion-icon name="call-outline"></ion-icon>+251 923 123 456</p>

                                <p><ion-icon name="location-outline"></ion-icon>Avenida Conego Manuel das Neves, Nº 192, Bairro Maianga, Luanda-Angola</p>
                                
                                <p><ion-icon name="time-outline"></ion-icon> Segunda a sexta: 09:00 até as 18:00</p>
                                <p>Siga-nos nas redes socias</p>
                                <a href="https://www.facebook.com/Garciaisaiasmanuel"><ion-icon name="logo-facebook" size="small"></ion-icon></a>
                                <a href="https://www.instagram.com/mr_garcia_manuel/"><ion-icon name="logo-linkedin" size="small"></ion-icon></a>
                                <a href="https://twitter.com/mrgarciamannuel"><ion-icon name="logo-instagram" size="small"></ion-icon></a>
                               

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div id="lateral">
        
        <form action="/contact" method="POST" id="formulario-contact" class="row g-3 needs-validation">
            @csrf
            <h3 id="contact-title">Esponha as suas dúvidas no formulário</h3>
            <input type="hidden" name="accessKey" value="514886ad-233e-45fe-9c12-e3ef1c5f3644">
            
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Primeiro nome</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="João" required>

            </div><br>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" id="validationCustom02" name="sobrenome" placeholder="Marcos" required>
                </div><br>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">País</label>
                    <input type="text" class="form-control" id="validationCustom03" name="pais" placeholder="Angola" required>
                </div><br>
                
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Província</label>
                    <input type="text" class="form-control" id="validationCustom03" name="provincia" placeholder="Luanda" required>
                </div><br>
                
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="validationCustom05" name="endereco" required>
                
                </div><br>
                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Mensagem</label><br>
                    <textarea type="text" class="form-control" id="validationCustom05" name="sms" required></textarea>

                </div><br>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                        Aceito os termos e condições
                        </label>
                        <div class="invalid-feedback">
                        Precisa aceitar antes de submeter.
                        </div>
                    </div>
                </div><br>
                <div class="col-12">
                <button type="submit" class="btn btn-outline-primary" id="btn-laranja">Enviar dados</button><br>
                </div>
        </form>
    </div>
</div>

    <script type="text/javascript">
        function submeter(){
            var nome= document.getElementById("validationCustom01").value;
            var sobrenome=document.getElementById("validationCustom02").value;
            var username=document.getElementById("inputGroupPrepend").value;
            var cidade=document.getElementById("validationCustom03").value;
            var regiao=document.getElementById("validationCustom04").value;
            var postal=document.getElementById("validationCustom05").value;
            
            alert("Parabens " + nome+ " "+sobrenome+" seus dados foram enviados para nossa base de dados");
        }
    </script>




  <!-- FIM FORMULÁRIO-->

@endsection