
@extends('layout')
@section('cabecalho')
    Criar usuario 
@endsection
@section('conteudo')
    <form action="../../user/save" method="POST">
        @csrf
        <label>Nome
            <input type='text' name='name'>
        </label>
        <label>Email
            <input type='email' name='email'>
        </label>
        <label>Senha
            <input type='password' name='password'>
        </label>
        <button type='submit'>
           Adicionar
        </button>
    </form>
@endsection