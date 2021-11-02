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
                <label>Id
                    <?php echo $user->id ?>
                </label>
                <input type="hidden" type='number' name="id" value="<?php echo $user->id ?>">
                <label>Nome
                    <input type='text' name='name' value='<?php echo $user->name ?>'>
                </label>
                <label>Email
                    <input type='email' name='email' value='<?php echo $user->email ?>'>
                </label>
                <label>Senha
                    <input type='password' name='password' value='<?php echo $user->email ?>'>
                </label>
                <button type='submit'>
                    Salvar
                </button>
            </form>
        </div> 
    </div>
@endsection
