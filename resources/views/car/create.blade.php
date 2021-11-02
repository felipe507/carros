
@extends('layout')
@section('titulo')
    Criar veículo manualmente
@endsection
@section('cabecalho')
    Criar veículo manualmente
@endsection
@section('conteudo')
    <div class="container">
        <div class="col mx-auto">
            <form action="../../car/save" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome do veículo:</label>
                    <input type='text' name='nome_veiculo' class="form-control" placeholder="Digite modelo do veículo" required>
                </div>
                <div class="form-group">
                <label>Link:</label>
                <input type="text" name='link' class="form-control" placeholder="Link do automóvel" required>
                </div>
                <div class="form-group">
                <label>Ano:</label>
                <input type="number" name='ano' class="form-control" placeholder="Qual ano?" required>
                </div>
                <div class="form-group">
                    <label>Quilometragem:</label>
                    <input type="number" name='quilometragem' class="form-control" placeholder="Quantos quilometros?" required>
                </div>
                <div class="form-group">
                    <label>Câmbio:</label>
                    <input type="text" name='cambio' class="form-control" placeholder="Qual é o câmbio?" required>
                </div>
                <div class="form-group">
                    <label>Número Porta(s):</label>
                    <input type="text" name='portas' class="form-control" placeholder="Quantas portas?" required>
                </div>
                <div class="form-group">
                    <label>Combustível:</label>
                    <input type="text" name='combustivel' class="form-control" placeholder="Qual o tipo do combustível?" required>
                </div>
                <div class="form-group">
                    <label>Cor:</label>
                    <input type="text" name='cor' class="form-control" placeholder="Qual cor do veículo?" required>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection