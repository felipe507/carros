@extends('layout')

@section('titulo')
    Lista de Usuários
@endsection

@section('cabecalho')
    Lista de Usuários  
@endsection
@section('conteudo')
    <a href="../../user/create">Adicionar</a>
    
    <?php if($users->count() > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>  
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a class="btn btn-danger btn-sm" href="../../user/edit/{{$user->id}}">Editar</a>
                            <a class="btn btn-secondary btn-sm" href="../../user/delete/{{$user->id}}">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum usuário cadastrado.</p>
    <?php endif; ?>
@endsection