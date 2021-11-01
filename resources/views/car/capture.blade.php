
@extends('layout')
@section('cabecalho')
    Criar usuario 
@endsection
@section('conteudo')
    <div class="col-md-6 box"> 
        <form action="../../car/capturar" method="post">
            @csrf
            Capturar Dados <input type="text"  name="search"><button type='submit' class='btn-primary'> Capturar </button>
        </form>
    </div>
@endsection