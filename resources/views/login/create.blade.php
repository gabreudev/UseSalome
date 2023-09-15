<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <h2 class="center-align">Cadastre-se</h2>
        <div class="row">
            <form class="col s12" action="{{ route('store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nome" type="text" name="name" class="validate">
                        <label for="nome">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" name="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">Senha</label>
                    </div>
                </div>
                <div class="row center-align">
                    <button class="btn waves-effect waves-light pink" type="submit">Cadastrar
                        <i class="material-icons right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>
