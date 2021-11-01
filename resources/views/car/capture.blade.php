
@extends('layout')
@section('cabecalho')
    Criar usuario 
@endsection
@section('conteudo')
    <div class="text-center"> 
        <form action="../../car/capturar" method="post">
            @csrf
            <b>Capturar Dados</b><br> <input type="text"  name="search"><button type='submit' class='btn-primary'> Capturar </button>
        </form>
    </div>
@endsection