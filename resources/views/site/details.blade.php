@extends('site.layout')

@section('conteudo')

<div class="row container">
    <div class="col s12 m6">
        <div class="card">
            <div class="card-image">
                <img src="{{$produto->image}}" alt="{{$produto->nome}}" class="responsive-img" style="border-radius: 10px">
            </div>
        </div>
    </div>

    <div class="col s12 m6">
        <div class="card">
            <div class="card-content">
                <h4>{{$produto->nome}}</h4>
                <h5 class="orange-text">R$ {{number_format($produto->preco, 2, ',', '.')}}</h5>
                <h6>Unidades disponíveis: {{$produto->quantidade}}</h6>
                <p>{{$produto->descricao}}</p>
                <form action="{{route('addcarrinho', $produto->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$produto->id}}">
                    <input type="hidden" name="descricao" value="{{$produto->descricao}}">
                    <input type="hidden" name="quantidade" value="1" min="1" max="{{$produto->quantidade}}">
                    <input type="hidden" name="nome" value="{{$produto->nome}}">
                    <input type="hidden" name="preco" value="{{$produto->preco}}">
                    <input type="hidden" name="image" value="{{$produto->image}}">
                    <button class="btn orange btn-large waves-effect waves-light">Adicionar ao Carrinho <i class="material-icons right">add_shopping_cart</i></button>
                </form>
            </div>
        </div>
    </div>

@endsection
