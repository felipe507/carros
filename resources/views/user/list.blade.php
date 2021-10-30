@extends('layout')

@section('cabecalho')
    Lista de Usuários  
@endsection
@section('conteudo')
    <table>
        <a href="../../user/create">Adicionar</a>
        <thead>
            <tr>
                <th>
                    Nome
                </th>
                <th>
                    Email
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
                    <a href="user/edit/<?php echo $user->id ?>"> Editar </a>
                </td>  
                <td>
                    <a href="user/delete/<?php echo $user->id ?>"> Excluir </a>
                </td>    
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection