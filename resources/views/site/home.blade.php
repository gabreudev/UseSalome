@extends('site.layout')

@section('conteudo')




<div class="row container">
    @foreach ($produtos as $key => $produto)

    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <img src="{{ $produto->image }}"> <!-- Coloque o campo correto do produto -->
                <a href="{{route('details', $produto->slug )}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>    
            </div>

            <div class="card-content">
                <span class="card-title">{{Str::limit($produto->nome, 40) }}</span> <!-- Coloque o campo correto do produto -->
            <h5>R${{$produto->preco}}</h5>                
            <p class="btn-holder"></p>

            </div>
        </div>
    </div>

    @endforeach
</div>

<div class="row center">
    {{$produtos->links('custom.pagination')}}
</div>

@endsection