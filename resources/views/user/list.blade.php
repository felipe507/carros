@extends('layout')

@section('titulo')
    Lista de Usuários
@endsection

@section('cabecalho')
    Lista de Usuários  
@endsection
@section('conteudo')
    <a href="../../user/create">Adicionar</a>
    <?php if(!empty($users)): ?>
        <table class="table">
            <thead class="thead">
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Email
                    </th> 
                    <th>
                        Açoes
                    </th>    
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td>
                        <?php echo $user->name ?> 
                    </td>
                    <td>
                        <?php echo $user->email ?> 
                    </td>  
                    <td>
                        <a href="../../user/edit/<?php echo $user->id ?>"> Editar </a>
                        <a href="../../user/delete/<?php echo $user->id ?>"> Excluir </a> 
                    </td>  
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php if(empty($users)): ?>
        Nao há itens cadastrados.
    <?php endif; ?>
@endsection