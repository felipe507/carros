
@extends('layout')
@section('titulo')
    Capturar Dados
@endsection
@section('cabecalho')
    Capturar Dados
@endsection
@section('conteudo')
    <div class="text-center"> 
        <form action="../../car/capturar" method="post">
            @csrf
            <h3><b>Capturar Dados de Veículos</b></h3><br> <input type="text" name="search"><button type='submit' class='btn-primary'> <i class="fas fa-search"></i> </button>
        </form>
    </div>
@endsection