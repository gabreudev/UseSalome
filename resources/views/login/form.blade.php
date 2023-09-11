@if($mensagem=Session::get('erro')) 
{{$mensagem}}
@endif

@if($errors->any())

    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form action="{{route('auth')}}" method="POST">
@csrf
Email: <br> <input type="email" name="email">
Senha: <br> <input type="password" name="password">
<button type="submit">Entrar</button>


</form>