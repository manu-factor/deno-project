<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', 'HolesController@home');
$router->get('/read', 'HolesController@read');
$router->get('/insert', 'HolesController@insertView');
$router->post('/insert', 'HolesController@insert');
$router->get('/hole/{id}', 'HolesController@single_hole_view');
$router->get('/hole/update/{id}', 'HolesController@hole_update_view');
$router->post('/hole/update/{id}', 'HolesController@hole_update_content');
$router->get('/hole/delete/{id}', 'HolesController@delete');
$router->get('/filter_records', 'HolesController@filter_records'); // for filters
$router->get('/getboreholes', 'HolesController@getBoreHoles'); // for map