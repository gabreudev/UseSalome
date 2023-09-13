

<form action="{{route('store')}}" method="POST">
@csrf
Nome: <br> <input  name="name">
Email: <br> <input type="email" name="email">
Senha: <br> <input type="password" name="password">
<button type="submit">Cadastrar</button>


</form>
