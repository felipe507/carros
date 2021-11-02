
# Projeto Teste Estoque

## Comandos para rodar o projeto
Instalar Dependências
- composer install
- composer update

Execultar todas as migrations (usuário, carros)
- php artisan migrate 

Inserir o primeiro usuário (email:admin@admin.com, senha: admin)
- php artisan db:seed --class=UsersTableSeeder

Rodar servidor 
- php artisan serve

## Dependencias projeto
    ```
        Browser-kit - "symfony/browser-kit": "^5.3",
        Crawler - "symfony/dom-crawler": "^5.3",
        Http-client - "symfony/http-client": "^5.3"
    ```

## Lib de Front-end utilizadas
    - Boostrap(https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p)
    - Font awesome(https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T)

## Funções Projeto

    - Autenticar usuários credenciados

    - Gerenciar usuários (adicionar, editar, listar, deletar).

    - Gerenciar Modelos de automóveis (listar, capturar automóveis de uma página externa, adicionar manualmente, deletar, buscar).

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
