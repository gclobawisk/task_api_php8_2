<h1 align="center">API PARA TAREFAS DESENVOLVIDA EM LARAVEL</h1>

<h2 align="center">INSTALAÇÃO E CONFIGURAÇÃO DA API</h2>

### Requerimentos:

* PHP 8.2
* MYSQL ou MARIADB
* LARAVEL 10: https://laravel.com/docs/10.x
* COMPOSER https://getcomposer.org/
* JWT-AUTH: https://jwt-auth.readthedocs.io/en/develop/laravel-installation/

### Passo 1: Configuração do Banco de Dados

Export ou Execute uma Query do arquivo nomeado: task_api.sql, o mesmo se encontra neste repositório.

Cria uma nova pasta e clone este repositório para a mesma utilizando o comando: 

``` git clone https://github.com/gclobawisk/task_api_php8_2.git ```

### Passo 2: Configuração do Ambiente de Desenvolvimento

Abra o seu Editor e execute os seguintes comandos para instalar as dependências necessárias

``` composer install ```

ou  caso esteja utilizando versões mais antigas utilize para atualizar.

```composer update```

### CONFITURAR A ENV.

Renomeie o arquivo .env.example para .env e edite os seguintes dados para:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_api
DB_USERNAME=root
DB_PASSWORD=
```

Agora vamos gerar as keys necessárias.
execute os comandos a seguir:

``` php artisan key:generate ``` <- Utilizada para funcionamento da aplicação em Laravel

``` php artisan jwt:secret ``` <- Utilizada para funcionamento do Pacote JWT-AUTH

Agora sim podemos colocar o servidor para rodar:

``` php artisan serve ```



