@extends('layout')

@section('titulo')
    Lista de usuários
@endsection

@section('cabecalho')
    Lista de usuários  
@endsection
@section('conteudo')
    <div class="container">
        <div class="col mx-auto">
            <div class="row">
                <div class='container-fluid'>
                    <div class="row align-items-start">
                        <div class="col">
                            <a class="btn btn-primary btn-sm" style="margin-bottom: 10px;" href="../../user/create">Adicionar usuário</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($users->count() > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>  
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="../../user/delete/{{$user->id}}"><i class="fas fa-trash-alt"></i></a>
                                    <a class="btn btn-secondary btn-sm" href="../../user/edit/{{$user->id}}"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum usuário cadastrado.</p>
            <?php endif; ?>
        </div>
    </div>     
@endsection