@extends('layout')

@section('titulo')
    Login
@endsection

@section('conteudo')
    <div class="jumbotron text-center">
        <h1>Login</h1>
    </div>
    <div class="container">
      <div class="col mx-auto">
        <form action="authenticate" method="POST" style='margin: 10px'>
          @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Email:</label>
              <input type="text" name='email' class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputSenha">Senha:</label>
            <input type="password" name='password' class="form-control" id="exampleInputSenha"  placeholder="Seu senha" required>
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div> 
    </div>

    
@endsection