@extends('site.layout')

@section('conteudo')


<div class="row container">
    @foreach ($produtos as $key => $produto)

    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="{{ $produto->imagem }}"> <!-- Coloque o campo correto do produto -->
                <span class="card-title">{{ $produto->nome }}</span> <!-- Coloque o campo correto do produto -->
                <a href="{{route('details', $produto->slug )}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
            </div>
            <div class="card-content">
                <p>{{ $produto->descricao }}</p> <!-- Coloque o campo correto do produto -->
            </div>
        </div>
    </div>

    @endforeach
</div>


@endsection