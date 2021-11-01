@extends('layout')

@section('titulo')
    Lista de Usuários
@endsection

@section('cabecalho')
    Lista de Usuários  
@endsection
@section('conteudo')
    <a class="btn btn-primary btn-sm" style="margin-bottom: 10px;" href="../../user/create">Adicionar Usuário</a>
    
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
                            <a class="btn btn-danger btn-sm" href="../../user/delete/{{$user->id}}">Excluir</a>
                            <a class="btn btn-secondary btn-sm" href="../../user/edit/{{$user->id}}">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum usuário cadastrado.</p>
    <?php endif; ?>
@endsection