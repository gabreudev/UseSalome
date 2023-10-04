<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>UseSalome</title>
</head>
<body>    



  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    @foreach($categoriasMenu as $categoriasM)
    <li><a href="{{route('categoria', $categoriasM->id )}}">{{$categoriasM->nome}}</a></li>
    @endforeach
  </ul>
  
  <!-- Dropdown Structure -->
  <ul id='dropdown2' class='dropdown-content'>

    @auth
    @if(auth()->user()->role == 'ROLE_ADMIN')
    <li><a href="{{route('listaProdutos')}}">Gerenciar produtos</a></li>
    <li><a href="">Gerenciar vendas</a></li>
    @else
    <li><a href="">Pedidos</a></li>
    @endif
    @endauth
    <li><a href="">Configurações</a></li>
    <li><a href="{{route('logout')}}">sair</a></li>
  </ul>

  <nav>
    <div class="nav-wrapper">
      <a href="{{route('index')}}" class="brand-logo center">UseSalome</a>
      <ul id="" class="left">
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="" class="dropdown-trigger" data-target='dropdown1'>Categorias<i class="material-icons right">expand_more</i></a></li>
        <li><a href="{{route('carrinho')}}">Carrinho<span class="new badge white" data-badge-caption="" style="color: black; font-weight:700;">{{count((array) session('carrinho'))}}</span></a></li>
        <li><a href="{{route('sobre')}}">Sobre</a></li>
      </ul>

      @auth
          
      <ul id="" class="right">
        <li><a href="" class="dropdown-trigger" data-target='dropdown2'>Olá {{auth()->user()->name}}<i class="material-icons right">expand_more</i></a></li>
      </ul>
    </div>

    @else

    <ul id="" class="right">
      <li><a href="{{route('form')}}">Login</a><i class="material-icons right">lock</i></li>
    </ul>
  </div>


    @endauth
  </nav>
  @if (session('success'))
  <div class="alert alert-success center">
      {{ session('success') }}
  </div>

 
 <style> .alert-success {
      background-color: #dff0d8; /* Cor de fundo verde */
      border: 1px solid #d0e9c6; /* Borda verde mais clara */
      color: #3c763d; /* Cor do texto verde escuro */
      padding: 10px; /* Espaçamento interno */
      margin: 10px 0; /* Espaçamento externo */
      border-radius: 4px; /* Borda arredondada */
  } </style>
  
@endif

</div>


  @yield('conteudo')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>     
    <script>  
        /* Dropdown */
      var elemDrop = document.querySelectorAll('.dropdown-trigger');
      var instanceDrop = M.Dropdown.init(elemDrop, {
          coverTrigger: false,
          constrainWidth: false
      });
    </script>
  </body>
</html>