@extends('layout')

@section('cabecalho')
    Lista de carros
@endsection
@section('conteudo')
    <table>
        <a href="../../car/create">Adicionar</a>
        <thead>
            <tr>
                <th>
                    Nome de veiculo
                </th>
                <th>
                    Link
                </th> 
                <th>
                    Ano
                </th> 
                <th>
                    Combustivel
                </th> 
                <th>
                    Porta
                </th> 
                <th>
                    Quilometragem
                </th> 
                <th>
                    Cambio
                </th> 
                <th>
                    Cor
                </th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($cars as $car): ?>
            <tr>
                <td>
                    <?php echo $car->nome_veiculo ?> 
                </td>
                <td>
                    <?php echo $car->link ?> 
                </td> 
                <td>
                    <?php echo $car->ano ?> 
                </td>
                <td>
                    <?php echo $car->combustivel ?> 
                </td>
                <td>
                    <?php echo $car->portas ?> 
                </td>
                <td>
                    <?php echo $car->quilometragem ?> 
                </td>
                <td>
                    <?php echo $car->cambio ?> 
                </td>
                <td>
                    <?php echo $car->cor ?> 
                </td>
                <td>
                    <a href="car/delete/<?php echo $car->id ?>"> Excluir </a>
                </td>    
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection