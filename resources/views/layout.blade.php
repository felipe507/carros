<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Veículos - @yield('titulo')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>
<body>
    <?php if(auth()->check()): ?>
        <div class="row">
            <div class="container-fluid">
                <div class="jumbotron text-center">
                    <h1>@yield('cabecalho')</h1>  |
                    <a href='../../user/list'>Gerenciamento Usuário</a> |
                    <a href='../../'>Gerenciamento Carros</a> |
                    <a href="../../sair">Sair</a> 
                </div>
            </div>
        </div>
    <?php endif ?>


    
    <div class="row">
        <div class="container-fluid">
            @yield('conteudo')
            @if(!empty($mensagem))
                <div class="alert  {{$tipo}} fixed-top">
                    {{$mensagem}}
                </div>  
            @endif
        </div>
    </div>
</body>
</html>