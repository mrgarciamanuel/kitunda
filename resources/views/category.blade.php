@extends('layouts.main')
@section('title','Kitunda')
@section('content')

<h1 id="products-title">Categoria de produtos oferecidos pelo Kitunda</h1>
<hr id="linha-horizontal-index">

    @foreach($categories as $category)
        <a href="category/{{$category['id']}}"><p>{{$category->name}}</p></a>
        <h4>É um nome comum para uma grande variedade de sementes de plantas de alguns gêneros da família Fabaceae. Proporciona nutrientes essenciais como proteínas, ferro, cálcio, vitaminas (principalmente do complexo B), carboidratos e fibras.</h4>
    @endforeach
@endsection