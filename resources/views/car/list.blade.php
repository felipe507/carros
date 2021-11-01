@extends('layout')

@section('titulo')
    Lista de carros
@endsection

@section('cabecalho')
    Lista de carros
@endsection
@section('conteudo')
    <a href="../../car/create">Adicionar</a>
    <form action="../../car/capture" method="post">
        @csrf
        Importar Dados <input type="text"  name="search"><button type='submit' class='btn-primary'> Capturar </button>
    </form>
    <form action="../../car/search" method="post">
        @csrf
       Buscar carros Cadastrados<input type="text"  name="search"><button type='submit' class='btn-primary'> Buscar </button>
    </form>
    <?php if(!empty($cars)): ?>
        <table class="table">
            <thead class="thead">
                <tr>
                    <th>
                        Veículo
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
                    <th>
                        Açoes
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
                            <a href='<?php echo $car->link ?> '> <?php echo $car->link ?> </a>
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
                            <a href="../../car/delete/<?php echo $car->id ?>"> Excluir </a>
                        </td>    
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php if(empty($cars)): ?>
        Nao há itens cadastrados.
    <?php endif; ?>
@endsection