@extends('site.layout')

@section('conteudo')

<div class="row container">
    <div class="cow s12 m6">
        <img src="{{$produto->image}}" class=" responsive-img">   
    </div>
    <div class="cow s12 m6">
        <p>{{$produto->nome}}</p>
        <p>{{$produto->descricao}}</p>
        <button class="btn orange btn-large">Comprar</button>
    </div>
</div>


@endsection