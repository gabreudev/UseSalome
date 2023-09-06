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
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="#!">three</a></li>
    <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
    <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
  </ul>
  
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">UseSalome</a>
      <ul id="" class="right">
        <li><a href="">Home</a></li>
        <li><a href="" class="dropdown-trigger" data-target='dropdown1'>Categorias<i class="material-icons right">expand_more</i></a></li>
        <li><a href="">Carrinho</a></li>
        <li><a href="">Sobre</a></li>
      </ul>
    </div>
  </nav>





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