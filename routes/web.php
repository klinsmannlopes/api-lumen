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

//Jornalista
$router->post('/api/login', 'AuthController@autenticate');
$router->post('/api/register', 'AuthController@create');
$router->post('/api/jornalista', 'JornalistaDadosController@getJornalista');

//noticias
$router->get('/api/news/me', 'NoticiaController@ListaNoticiasJornalista');
$router->get('/api/news/type/{type_id}', 'NoticiaController@listaTipoNoticiaJornalista');
$router->post('/api/news/create', 'NoticiaController@createNoticia');
$router->post('/api/news/update/{news_id}', 'NoticiaController@updateNoticia');

$router->post('/api/news/delete/{news_id}', 'NoticiaController@DeleteNoticia');
//$router->get('/api/news/type/{type_id}', 'NoticiaController@ListaClientes');