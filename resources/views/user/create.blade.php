
@extends('layout')
@section('cabecalho')
    Criar usuario 
@endsection
@section('conteudo')
  <div class="container">
    <div class="col mx-auto">
      <form action="../../user/save" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" name='name' class="form-control"  placeholder="Seu nome" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Endereço de email</label>
          <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
    </div>
  </div>
@endsection