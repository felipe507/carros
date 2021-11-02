
<h1> Projeto Teste Estoque </h1>

## Comandos para rodar o projeto
Instalar Dependências
composer install
composer update

Execultar todas as migrations (usuário, carros)
php artisan migrate 

Inserir o primeiro usuário (email:admin@admin.com, senha: admin)
php artisan - db:seed --class=UsersTableSeeder

Rodar servidor - php artisan serve

## Dependencias projeto
    Browser-kit - "symfony/browser-kit": "^5.3",
    Crawler - "symfony/dom-crawler": "^5.3",
    Http-client - "symfony/http-client": "^5.3"

## Funções Projeto
    - Autenticar usuários credenciados
    - Gerenciar usuários (adicionar, editar, listar, deletar).
    - Gerenciar Modelos de automóveis (listar, capturar automóveis de uma página externa, adicionar manualmente, deletar, buscar).
.
## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
