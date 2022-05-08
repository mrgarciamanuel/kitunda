@extends('layouts.main')
@section('title','Kitunda')
@section('content')

@foreach($categories as $category)
    <a href="category/{{$category['id']}}"><p>{{$category->name}}</p></a>
@endforeach

@endsection