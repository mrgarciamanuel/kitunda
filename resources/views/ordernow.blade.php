<?php
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use App\Models\Cart;

    $user = auth()->user();//verificar autentificação do utilizador
    $userId = $user->id;//variavel userId recebe o identificador do

    //variavel $totPriceCarrinhio recebe a soma em kwanza de todos produtos no carrinho
    $totPriceCarrinhio = DB::table('cart')
->join('products','cart.product_id','=','products.id')
->where('cart.user_id',$userId)->sum('products.price');
    $envio = 200;
?>
@extends('layouts.main')
@section('title','Kitunda - Ver produtos')
@section('content')

<h1>Carrinho</h1>
<div>
<table class="table table-bordered">
    <tbody>
      <tr>
        <td>Preço</td>
        <td>{{$totPriceCarrinho}},00 AOA</td>
      </tr>
      <tr>
        <td>Taxa</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Envio</td>
        <td>200</td>
      </tr>
      <tr>
        <td>Preço total</td>
        <td>{{$totPriceCarrinho+$envio}},00 AOA</td>

      </tr>
    </tbody>
  </table>
</div>
<div>
<form action="/action_page.php">
  <div class="form-group">
    <textarea type="email" id="email"></textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Metodos de pagamentos:</label><br><br>
    <input type="radio" name="payment"><span>Multbanco</span><br>
    <input type="radio" name="payment"><span>Paypal</span><br>
    <input type="radio" name="payment"><span>Visa</span><br>
    <input type="radio" name="payment"><span>Mastercard</span><br>

  </div>
  <button type="submit" class="btn btn-default">Finalizar compra</button>
</form>
</div>
@endsection