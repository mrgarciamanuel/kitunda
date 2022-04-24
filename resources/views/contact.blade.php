<!--Extendendo para está página o layout que está em main-->
@extends('layouts.main')
@section('title','Kitunda')
@section('content')

<!-- INÍCIO FORMULÁRIO-->

<form action="/contact" method="POST" >
      @csrf
      <h4>Esponha as suas dúvidas no formulário</h4>
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
        <div class="col-md-3">
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
        <input type="submit" value="Submeter"><br>
        </div>
  </form>

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