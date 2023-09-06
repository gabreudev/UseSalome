@extends('site.layout')

@section('conteudo')




<div class="row container">
    @foreach ($produtos as $key => $produto)

    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="{{ $produto->image }}"> <!-- Coloque o campo correto do produto -->
                <a href="{{route('details', $produto->slug )}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>    
            </div>

            <div class="card-content">
                <span class="card-title">{{ $produto->nome }}</span> <!-- Coloque o campo correto do produto -->
                
            
                <p>{{Str::limit($produto->descricao, 40)}}</p> <!-- Coloque o campo correto do produto -->
            </div>
        </div>
    </div>

    @endforeach
</div>

<div class="row center">
    {{$produtos->links('custom.pagination')}}
</div>

@endsection