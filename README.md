<h1 align="center">API PARA TAREFAS DESENVOLVIDA EM LARAVEL</h1>

<h2 align="center">INSTALAÇÃO E CONFIGURAÇÃO DA API</h2>

### Requerimentos:

* PHP 8.2
* MYSQL ou MARIADB
* LARAVEL 10: https://laravel.com/docs/10.x
* COMPOSER https://getcomposer.org/
* JWT-AUTH: https://jwt-auth.readthedocs.io/en/develop/laravel-installation/

## Passo 1: Configuração do Banco de Dados

Export ou Execute uma Query do arquivo nomeado: task_api.sql, o mesmo se encontra neste repositório.

Cria uma nova pasta e clone este repositório para a mesma utilizando o comando: 

``` git clone https://github.com/gclobawisk/task_api_php8_2.git ```

## Passo 2: Configuração do Ambiente de Desenvolvimento

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

<hr>
<h2 align="center">TUTORIAL PARA UTILIZAÇÃO DA API</h2>

### É necessários autenticar-se para utilizar o Sistema, caso contrário não teremos acesso aos dados conforme mostra a imagem abaixo:

![image](https://user-images.githubusercontent.com/69816930/223211607-2bb2bc5b-7dd9-437e-9f94-0ad620740505.png)


<!-- POST LOGIN ALL -->

<h3 class="text-white text-center bg-dark">AUTENTICAÇÃO<small class="text-muted" id="auth">
</small></h3>

<div class="table-responsive shadow p-3 mb-2 bg-white rounded ">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>MÉTODO</th>
            <th>ENDPOINT </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>POST</td>
            <td>http://localhost:8000/api/v1/login</td>
        </tr>
    </tbody>
</table>
</div>

<h3>ARGUMENTOS REQUERIDOS</h3>
<b>Json Exemplo:</b>
<div class="table-responsive shadow p-3 mb-2 rounded bg-light text-dark">

<pre class="d-flex flex-end">
{
"email": "administrador@taskapi.com",
"password": "taskapi"
}
</pre>

</div>


<a class="btn btn-secondary mt-0 mb-2 d-flex flex-end text-white"
data-bs-toggle="collapse" aria-expanded="false" aria-controls="responseLogin "
href="#responseLogin" role="button"> Resposta em JSON </a>

<div class="table-responsive shadow p-3 mb-5 rounded bg-secondary text-white collapse"
role="start" id="responseLogin">

<pre class="">
{
"acess_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC90YXNrYXBpLnRlY25vbG9naWEud3NcL2FwaVwvdjFcL2xvZ2luIiwiaWF0IjoxNjc4MDQ2NDUwLCJleHAiOjE2NzgwNjgwNTAsIm5iZiI6MTY3ODA0NjQ1MCwianRpIjoibWhmdEp1Tkx6MTdmc2k5WiIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.jEtrLSM9EE7-aTAsPP-ax_S9Oh0eY8wgMLzbE7uF0_0",
"token_type": "Bearer",
"expires_in": 360,
"user": {
"id": 1,
"name": "Administrador",
"email": "administrador@taskapi.com",
"email_verified_at": null,
"created_at": null,
"updated_at": null
}
}</pre>

</div>




<hr class="mb-5">


<!-- GET ALL -->
<h3 class="text-white text-center bg-dark" id="sectionGetAll">OBTER TODAS AS TAREFAS<small
    class="text-muted"> </small></h3>

<div class="table-responsive shadow p-3 mb-2 bg-white rounded ">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>MÉTODO</th>
            <th>ENDPOINT </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>GET</td>
            <td>http://localhost:8000/api/v1/tasks</td>
        </tr>
    </tbody>
</table>
</div>

<a class="btn btn-secondary mt-0 mb-2 d-flex flex-end text-white"
data-bs-toggle="collapse" aria-expanded="false" aria-controls="responseGetAll "
href="#responseGetAll" role="button"> Resposta em JSON: </a>

<div class="table-responsive shadow p-3 mb-5 rounded bg-secondary text-white collapse"
role="start" id="responseGetAll">

<pre class="d-flex flex-end">
{
"message": "Todas as tarefas",
"error": "false",
"code": 200,
"results": [
{
"task_id": "1",
"task_title": "Desenvolver uma Loja Virtual",
"task_description": "Preciso desenvolver uma loja virtual para a empresa JOANNA MULTIMARCAS, usar Wordpress + Woocommerce e Hospedar.",
"task_start_date": "2023-03-08 00:01:00",
"task_end_date": "2023-03-22 23:59:59",
"task_status": "1",
"fk_task_id_user": "1"
},
{
"task_id": "2",
"task_title": "Levar o Carro para Lavar",
"task_description": "No sábado, preciso levar o carro ao Lava Jato do Marquinho",
"task_start_date": "2023-03-11 09:00:00",
"task_end_date": "2023-03-11 12:00:00",
"task_status": "1",
"fk_task_id_user": "1"
},
{
"task_id": "3",
"task_title": "Ir ao Mercado",
"task_description": "Preciso ir ao mercado no domingo pela manhã e fazer as compras do mês",
"task_start_date": "2023-03-12 08:00:00",
"task_end_date": "2023-03-12 11:30:00",
"task_status": "1",
"fk_task_id_user": "1"
},
{
"task_id": "4",
"task_title": "Finalizar meu TCC",
"task_description": "Preciso retornar ao meu TCC",
"task_start_date": "2023-03-13 18:00:00",
"task_end_date": "2023-03-31 18:00:00",
"task_status": "1",
"fk_task_id_user": "1"
}
]
}
</pre>

</div>

<hr class="mb-5">


<!-- GET BY ID -->
<h3 class="text-white text-center bg-dark" id="sectionGetByID">OBTER TAREFA POR ID</h3>
<div class="table-responsive shadow p-3 mb-5 bg-white rounded">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>MÉTODO</th>
            <th>ENDPOINT </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>GET</td>
            <td>http://localhost:8000/api/v1/tasks/{task_id}</td>
        </tr>
    </tbody>
</table>
</div>
<h3>PARÂMETRO REQUERIDO</h3>
<div class="table-responsive">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>PARÂMETROS</th>
            <th>DESCRIÇÃO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>task_id</td>
            <td>Retornará uma tarefa de acordo com o ID fornecedo.</td>
        </tr>
    </tbody>
</table>
</div>


<a class="btn btn-secondary mt-0 mb-2 d-flex flex-end text-white"
data-bs-toggle="collapse" aria-expanded="false" aria-controls="responseGetByID "
href="#responseGetByID" role="button"> Resposta em JSON: </a>

<div class="table-responsive shadow p-3 mb-5 rounded bg-secondary text-white collapse"
role="start" id="responseGetByID">

<pre class="d-flex flex-end">
{
"message": "Detalhes da tarefa",
"error": "false",
"code": 200,
"results": [
{
"task_id": "1",
"task_title": "Desenvolver uma Loja Virtual",
"task_description": "Preciso desenvolver uma loja virtual para a empresa JOANNA MULTIMARCAS, usar Wordpress + Woocommerce e Hospedar.",
"task_start_date": "2023-03-08 00:01:00",
"task_end_date": "2023-03-22 23:59:59",
"task_status": "1",
"fk_task_id_user": "1"
}
]
}</pre>

</div>


<hr class="mb-5">



<!-- POST CREATE -->

<h3 class="text-white text-center bg-primary" id="sectionCreate">CRIAR UMA TAREFA <small
    class="text-muted"> </small></h3>
<div class="table-responsive shadow p-3 mb-5 bg-white rounded">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>MÉTODO</th>
            <th>ENDPOINT </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>POST</td>
            <td>http://localhost:8000/api/v1/tasks/create</td>
        </tr>
    </tbody>
</table>
</div>
<h3>ARGUMENTOS REQUERIDOS</h3>
<div class="table-responsive shadow p-3 mb-2 bg-white rounded">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>PARÂMETROS</th>
            <th>DESCRIÇÃO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>task_title</td>
            <td>Título da Tarefa.</td>
        </tr>
        <tr>
            <td>task_description</td>
            <td>Descrição da Tarefa.</td>
        </tr>
        <tr>
            <td>task_start_date</td>
            <td>Data Inícial da Tarefa.</td>
        </tr>
        <tr>
            <td>task_end_date</td>
            <td>Data Final da Tarefa.</td>
        </tr>
        <tr>
            <td>fk_task_id_user</td>
            <td>Para qual usuário a Tarefa pertence.</td>
        </tr>
    </tbody>
</table>
</div>

<b>Json Exemplo:</b>
<div class="table-responsive shadow p-3 mb-2 rounded bg-light text-dark">

<pre class="">
{
"task_title": "Criando Tarefa",
"task_description": "criando descrição da tarefa",
"task_start_date": "2023-03-25 23:45:12",
"task_end_date": "2023-03-11 23:45:12",
"fk_task_id_user": 1
}</pre>

</div>


<a class="btn btn-secondary mt-0 mb-2 d-flex flex-end text-white"
data-bs-toggle="collapse" aria-expanded="false" aria-controls="responseCreate"
href="#responseCreate" role="button"> Resposta em JSON </a>

<div class="table-responsive shadow p-3 mb-5 rounded bg-secondary text-white collapse"
role="start" id="responseCreate">

<pre class="">
{
"message": "Tarefa criada com sucesso",
"error": "false",
"code": 200,
"results": {
"task_title": "Criando Tarefa",
"task_description": "criando a descrição da tarefa",
"task_start_date": "2023-03-25 23:45:12",
"task_end_date": "2023-03-11 23:45:12",
"fk_task_id_user": 1
}
}</pre>

</div>


<hr class="mb-5">


<!-- PUT -->

<h3 class="text-white text-center bg-success" id="sectionUpdate">EDITAR UMA TAREFA <small
    class="text-muted"> </small></h3>
<div class="table-responsive shadow p-3 mb-5 bg-white rounded">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>MÉTODO</th>
            <th>ENDPOINT </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>PUT</td>
            <td>http://localhost:8000/api/v1/tasks/update/{task_id}</td>
        </tr>
    </tbody>
</table>
</div>
<h3>PARÂMETRO REQUERIDO NA URL</h3>
<div class="table-responsive shadow p-3 mb-5 bg-white rounded">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>PARÂMETROS</th>
            <th>DESCRIÇÃO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>task_id</td>
            <td>ID da Tarefa que será editada.</td>
        </tr>
    </tbody>
</table>
</div>

<b>Json Exemplo:</b>
<div class="table-responsive shadow p-3 mb-2 rounded bg-light text-dark">

<pre class="">
{
"task_title": "Editando a Tarefa",
"task_description": "Editando a descrição da tarefa",
"task_start_date": "2023-03-25 23:45:12",
"task_end_date": "2023-03-11 23:45:12",
"fk_task_id_user": 1
}</pre>

</div>


<a class="btn btn-secondary mt-0 mb-2 d-flex flex-end text-white"
data-bs-toggle="collapse" aria-expanded="false" aria-controls="responseUpdate"
href="#responseUpdate" role="button"> Resposta em JSON </a>

<div class="table-responsive shadow p-3 mb-5 rounded bg-secondary text-white collapse"
role="start" id="responseUpdate">

<pre class="">
{
"message": "Tarefa editada com sucesso",
"error": "false",
"code": 200,
"results": {
"task_title": "Editando a Tarefa",
"task_description": "Editando a descrição da tarefa",
"task_start_date": "2023-03-25 23:45:12",
"task_end_date": "2023-03-11 23:45:12",
"fk_task_id_user": 1
}
}</pre>

</div>


<hr class="mb-5">


<!-- DELETAR -->

<h3 class="text-danger text-center bg-danger text-white" id="sectionDelete">DELETAR UMA TAREFA</h3>
<div class="table-responsive shadow p-3 mb-5 bg-white rounded bg-danger">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>MÉTODO</th>
            <th>ENDPOINT </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>DELETE</td>
            <td>http://localhost:8000/api/v1/tasks/{task_id}</td>
        </tr>
    </tbody>
</table>
</div>
<h3>PARÂMETRO REQUERIDO NA URL</h3>
<div class="table-responsive shadow p-3 mb-5 bg-white rounded">
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>PARÂMETROS</th>
            <th>DESCRIÇÃO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>task_id</td>
            <td>ID da Tarefa que será deletada.</td>
        </tr>
    </tbody>
</table>
</div>

<a class="btn btn-secondary mt-0 mb-2 d-flex flex-end text-white"
data-bs-toggle="collapse" aria-expanded="false" aria-controls="responseDelete "
href="#responseDelete" role="button"> Resposta em JSON: </a>

<div class="table-responsive shadow p-3 mb-5 rounded bg-secondary text-white collapse"
role="start" id="responseDelete">

<pre class="">
{
"message": "Tarefa deletada com Sucesso",
"error": "false",
"code": 200
}</pre>

</div>




</div>
</div>
</div>
</div>
</div>
</div>
</div>
