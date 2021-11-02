@extends('layout')

@section('titulo')
    Editar Usuário
@endsection

@section('cabecalho')
    Editar usuário <?php echo auth()->user()->name; ?>
@endsection

@section('conteudo')
    <div class="container">
        <div class="col mx-auto">
          <form action="../../user/save" method="POST">
            @csrf
            @csrf
            <label class="d-none">
                <input type="text" name='id' class="form-control"  placeholder="Seu nome"  value='<?php echo $user->id?>' required>
            </label>
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name='name' class="form-control"  placeholder="Seu nome"  value='<?php echo $user->name?>' required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Endereço de email:</label>
              <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value='<?php echo $user->email?>' placeholder="Seu email" required>
            </div>
            <div class="form-group">
              <label>Senha:</label>
              <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Senha"   value='<?php echo $user->password?>' required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </form>
        </div>
      </div
@endsection
