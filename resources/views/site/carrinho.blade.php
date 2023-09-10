@extends('site.layout')

@section('conteudo')

<div class="row container">
    <h4 style="font-style:italic">Carrinho<i class="material-icons"></i></h4>

    <table class="striped">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Nome</th>
                <th>subtotal</th>
                <th>Quantidade</th>
                
            </tr>
        </thead>

        <tbody>
            @php $total = 0 @endphp
            @if (session('carrinho'))
                @foreach(session('carrinho') as $id => $details)
                    @php
                    $total += $details['preco'] * $details['quantidade'];
                    $formattedName = strlen($details['nome']) > 20 ? substr($details['nome'], 0, 20) . '...' : $details['nome'];
                    @endphp
                    <tr>
                        <td style="border-radius: 5px"><img src="{{$details['image']}}" alt="{{$details['nome']}}" style="width: 200px; border-radius:5px; height: 150px"></td>
                        <td>{{$details['nome']}}</td>
                        <td>R${{number_format($details['preco'], 2, ',', '.')}}</td>
                        <td>
                            <input type="number" value="1" min="1" max="{{$details['estoque']}}"/></td>
                        <td>
                            <form action="{{ route('rmvcarrinho', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-floating waves-effect waves-light red circle"><i class="material-icons right">delete</i></button>
                            </form>
                            <form action="{{ route('atualizacarrinho') }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="{{$id}}">
                            <button type="submit" class="btn-floating waves-effect waves-light orange circle"><i class="material-icons right">refresh</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                <td><strong>R${{number_format($total, 2, ',', '.')}}</strong>   <button type="submit"  style="margin: 5px" class="btn-floating waves-effect waves-light orange circle">  <i class="material-icons right">refresh</i></button></td>
                <td>  </td>
            </tr>
        </tfoot>
    </table>
    <div class="row container center">
        <button class="btn waves-effect waves-light orange">Continuar comprando <i class="material-icons right">arow_back</i></button>
        <form action="{{route('limparcarrinho')}}">
            @csrf
            <button class="btn waves-effect waves-light blue">Limpar carrinho <i class="material-icons right">clear</i></button>
        </form>

        <button class="btn waves-effect waves-light green">Finalizar compras <i class="material-icons right">cheeck</i></button>
    </div>
</div>

<!-- Adicione este código JavaScript no final da página ou em um arquivo separado -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nomeElements = document.querySelectorAll('td[data-product-name]');
        nomeElements.forEach(function(element) {
            const nome = element.getAttribute('data-product-name');
            element.title = nome; // Adiciona um título com o nome completo para mostrar em hover
        });
    });
</script>

@endsection
