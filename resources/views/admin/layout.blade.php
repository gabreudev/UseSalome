<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>   
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/style.css">


    
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    @foreach($categoriasMenu as $categoriasM)
    <li><a href="{{route('categoria', $categoriasM->id )}}">{{$categoriasM->nome}}</a></li>
    @endforeach
  </ul>
  
  <!-- Dropdown Structure -->
  <ul id='dropdown2' class='dropdown-content'>
    <li><a href="">Pedidos</a></li>
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


    @yield('conteudo')
 
    
</head>
<body>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/chart.js" ></script>
    <script src="js/main.js"></script>
    

</body>
</html>