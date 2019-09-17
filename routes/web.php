<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//login

$router->post('api/login', 'AuthController@autenticate');
$router->post('api/register', 'AuthController@create');


//noticias
$router->get('/api/news/me', 'NoticiaController@listaClientes');
$router->get('/api/news/create', 'NoticiaController@createNoticia');
$router->get('/api/news/update/{news_id}', 'NoticiaController@ListaClientes');
$router->get('/api/news/delete/{news_id}', 'NoticiaController@ListaClientes');
$router->get('/api/news/type/{type_id}', 'NoticiaController@ListaClientes');





$router->get('/clientes/{id}', 'APIController@ListaCliente');
$router->post('/clientes', 'APIController@CadastarCliente');
$router->delete('/clientes/{id}', 'APIController@DeleteCliente');
$router->put('/clientes', 'APIController@AlteraCliente');