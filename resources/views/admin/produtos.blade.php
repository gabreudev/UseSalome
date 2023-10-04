@extends('admin.layout')

@section('conteudo')

<div class="fixed-action-btn">
  <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="{{route('cadastroProd')}}">
    <i class="large material-icons">add</i>
  </a>   
</div>

 <!-- Modal Structure -->
 <div id="modal" class="modal">
  <div class="modal-content">
    <h4><i class="material-icons">card_giftcard</i> Novo produto</h4>
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>

        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Materialize Select</label>
        </div>          

      </div> 
     
      <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cadastrar</a><br>
  </div>
  
</form>
</div>
 <!-- End Modal Structure -->

<!-- Modal de Confirmação de Exclusão -->
<div id="confirm-delete-modal" class="modal">
  <div class="modal-content">
    <h4>Confirmação de Exclusão</h4>
    <p>Você tem certeza de que deseja excluir este produto?</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    <a href="#" id="confirm-delete-btn" class="modal-close waves-effect waves-red btn-flat">Excluir</a>
  </div>
</div>
<!-- End Modal de Confirmação de Exclusão -->



  <div class="row container crud">
      
          <div class="row ">              
            <h1 class="left">Produtos</h1> <br> <br> <br> <br> <br>
            <a href="{{route('semEstoque')}}" class="modal-close waves-effect waves-green btn pink right">Sem estoque</a>
          </div>

         <nav class="bg-gradient-blue">
          <div class="nav-wrapper">
            <form>
              <div class="input-field">
                <input placeholder="Pesquisar..." id="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
              </div>
            </form>
          </div>
        </nav>     

          <div class="card z-depth-4 registros" >
          <table class="striped ">
              <thead>
                <tr>
                  <th>Produto</th>              
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Estoque</th>
                    <th></th>
                </tr>
              </thead>
      
              <tbody>
                @foreach ($produtos as $produto)
                <tr>
                  <td>{{$produto->nome}}</td>                    
                  <td>R${{$produto->preco}}</td>
                  <td>{{$produto->categoria->nome}}</td>
                  <td>{{$produto->quantidade}}</td>
                  <td>
                    <a class="btn-floating waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                    <a class="btn-floating waves-effect waves-light red delete-btn" data-id="{{ $produto->id }}"><i class="material-icons">delete</i></a>
                  </td>
                </tr> 
                @endforeach
                
               
              </tbody>
            </table>
          </div> 

          <div class="row center">
            {{$produtos->links('custom.pagination')}}
        </div>             
  </div>
         

     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>     
     <script>  
         /* Dropdown */
       var elemDrop = document.querySelectorAll('.dropdown-trigger');
       var instanceDrop = M.Dropdown.init(elemDrop, {
           coverTrigger: false,
           constrainWidth: false
       });
       document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {});

    var deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var productId = this.getAttribute('data-id');
            var confirmDeleteBtn = document.getElementById('confirm-delete-btn');
            var deleteUrl = '/deleteProd/' + productId; // Defina a rota correta aqui
            confirmDeleteBtn.setAttribute('href', deleteUrl);

            var modalInstance = M.Modal.getInstance(document.getElementById('confirm-delete-modal'));
            modalInstance.open();
        });
    });
});

     </script>
@endsection

