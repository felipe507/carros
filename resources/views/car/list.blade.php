@extends('layout')

@section('titulo')
    Lista de veículos
@endsection

@section('cabecalho')
    Lista de veículos Cadastrados
@endsection
@section('conteudo')
    <div class="col mx-auto">
        <div class="row">
            <div class='container-fluid'>
                <div class="row align-items-start">
                    <div class="col">
                        <a class="btn btn-primary btn-sm" style="margin-bottom: 10px;" href="../../car/create">Adicionar Modelo Manualmente</a>
                        <a class="btn btn-primary btn-sm" style="margin-bottom: 10px;" href="../../car/capture">Capturar Modelos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class='container-fluid'>
                <div class="row align-items-start text-center" style="margin-bottom: 10px;">
                    <div class="col-md-12 box"> 
                        <form action="../../car/search" method="post">
                            @csrf
                            Buscar Cadastrado <input type="text"  name="search"><button type='submit' class='btn-primary'> Buscar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class='container-fluid'>
                <div class="row align-items-start">
                    <div class="col">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Veículo</th>
                                    <th>Link</th> 
                                    <th>Ano</th> 
                                    <th>Combustível</th> 
                                    <th>NºPortas</th> 
                                    <th>Quilometragem</th> 
                                    <th>Câmbio</th> 
                                    <th>Cor</th> 
                                    <th>Ações</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($cars->count() > 0 ): ?>
                                    @foreach($cars as $car)
                                        <tr>
                                            <td>{{$car->nome_veiculo}}</td>
                                            <td>{{$car->link}}</td>
                                            <td>{{$car->ano}}</td>
                                            <td>{{$car->combustivel}}</td>
                                            <td>{{$car->portas}}</td>
                                            <td>{{$car->cambio}}</td>
                                            <td>{{$car->quilometragem}}</td>
                                            <td>{{$car->cor}}</td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="../../car/delete/{{$car->id}}">Excluir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                <?php else: ?>
                                    <tr>
                                        Nao há veículos cadastrados.
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection