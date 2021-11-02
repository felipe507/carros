
@extends('layout')
@section('cabecalho')
    Criar usuario 
@endsection
@section('conteudo')
    <div class="text-center"> 
        <form action="../../car/capturar" method="post">
            @csrf
            <h3><b>Capturar Dados de Veículos</b></h3><br> <input type="text" name="search"><button type='submit' class='btn-primary'> <i class="fas fa-search"></i> </button>
        </form>
    </div>
@endsection