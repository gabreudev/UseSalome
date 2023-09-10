@extends('site.layout')

@section('conteudo')

<div class="row container">
    <h3 class="category-title">{{$categoria->nome}}</h3>

    @foreach ($produtos as $key => $produto)
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="{{ $produto->image }}" class="responsive-img">
                <a href="{{ route('details', $produto->slug) }}" class="view-button btn-floating halfway-fab waves-effect waves-light red">
                    <i class="material-icons">visibility</i>
                </a>
            </div>

            <div class="card-content">
                <span class="card-title product-title">{{ $produto->nome }}</span>
                <p class="product-description">{{ Str::limit($produto->descricao, 40) }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row center">
    {{ $produtos->links('custom.pagination') }}
</div>



@endsection
