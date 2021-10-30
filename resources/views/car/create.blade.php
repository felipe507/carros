
@extends('layout')
@section('cabecalho')
    Criar usuario 
@endsection
@section('conteudo')
    <form action="../../car/save" method="POST">
        @csrf
        <label>Nome do veiculo
            <input type='text' name='nome_veiculo'>
        </label>
        <label>Link
            <input type='text' name='link'>
        </label>
        <label>Ano
            <input type='text' name='ano'>
        </label>
        <label>Combustivel
            <input type='text' name='combustivel'>
        </label>
        <label>Porta
            <input type='checkbox' value='2' name='portas'>2
            <input type='checkbox' value='3'name='portas'>3
            <input type='checkbox' value='4'name='portas'>4
        </label>
        <label>Quilometragem
            <input type='text' name='quilometragem'>
        </label>
        <label>Cambio
            <input type='text' name='cambio'>
        </label>
        <label>Cor
            <input type='text' name='cor'>
        </label>
        <button type='submit'>
            Cadastrar
        </button>
    </form>
@endsection