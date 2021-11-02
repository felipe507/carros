
@extends('layout')
@section('cabecalho')
    Criar usuario 
@endsection
@section('conteudo')
    <div class="container">
        <div class="col mx-auto">
            <form action="../../car/save" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome do veiculo</label>
                    <input type='text' name='nome_veiculo' class="form-control" placeholder="Digite modelo do veículo" required>
                </div>
                <div class="form-group">
                <label>Link</label>
                <input type="text" name='link' class="form-control" placeholder="Link" required>
                </div>
                <div class="form-group">
                <label>Ano</label>
                <input type="number" name='ano' class="form-control" placeholder="Qual ano?" required>
                </div>
                <div class="form-group">
                    <label>Quilometragem</label>
                    <input type="number" name='quilometragem' class="form-control" placeholder="Quantas quilometros?" required>
                </div>
                <div class="form-group">
                    <label>Cambio</label>
                    <input type="text" name='cambio' class="form-control" placeholder="Quantas câmbio?" required>
                </div>
                <div class="form-group">
                    <label>Número Porta</label>
                    <input type="text" name='portas' class="form-control" placeholder="Quantas portas?" required>
                </div>
                <div class="form-group">
                    <label>Combustível</label>
                    <input type="text" name='combustivel' class="form-control" placeholder="Qual combustível" required>
                </div>
                <div class="form-group">
                    <label>Cor</label>
                    <input type="text" name='cor' class="form-control" placeholder="Qual cor do veiculo" required>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection