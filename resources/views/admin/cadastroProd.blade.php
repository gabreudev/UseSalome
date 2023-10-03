@extends('admin.layout')
@section('conteudo')
    <div class="container">
        <h1 class="center-align">Cadastro de Produto</h1>
        <form action="processar_cadastro.php" method="POST" enctype="multipart/form-data">
            <div class="input-field">
                <input type="text" id="nome" name="nome" required>
                <label for="nome">Nome do Produto</label>
            </div>
            
            <div class="input-field">
                <textarea id="descricao" name="descricao" class="materialize-textarea" required></textarea>
                <label for="descricao">Descrição</label>
            </div>

            <div class="input-field">
                <input type="number" id="preco" name="preco" step="0.01" required>
                <label for="preco">Preço</label>
            </div>

            <div class="input-field">
                <select id="categoria" name="categoria" required>
                    <option value="" disabled selected>Escolha a Categoria</option>
                    @foreach($categoriasMenu as $categoriasM)
                    <option value="{{$categoriasM->id}}">{{$categoriasM->nome}}</option>
                    @endforeach
                    
                    <!-- Adicione mais opções de categoria conforme necessário -->
                </select>
                <label>Categoria</label>
            </div>

            <div class="file-field input-field">
                <div class="btn center">
                    <span>Escolher Foto</span>
                    <input type="file" id="foto" name="foto" accept="image/*" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <button class="btn waves-effect waves-light right" type="submit" name="action">Cadastrar Produto</button>
        </form>
    </div>

    <!-- Inclua os arquivos JavaScript do Materialize CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Inicialize os campos de seleção e o campo de arquivo
        document.addEventListener('DOMContentLoaded', function() {
            var selectElems = document.querySelectorAll('select');
            var fileElems = document.querySelectorAll('.file-field');

            M.FormSelect.init(selectElems);
            M.FileField.init(fileElems);
        });
    </script>

     
@endsection