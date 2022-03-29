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
$router->get('/hole/{id}', 'HolesController@single_hole_view');
$router->get('/filter_records', 'HolesController@filter_records'); // for filters
$router->get('/getboreholes', 'HolesController@getBoreHoles'); // for map

// guest
$router->post('/registerUser', 'AuthController@registerUser');
$router->post('/loginUser', 'AuthController@loginUser');
$router->get('/login', 'AuthController@loginForm');
$router->get('/register', 'AuthController@registerationForm');


// auth
$router->get('/logout', 'SUController@logout');
$router->get('/hole/update/{id}', 'SUController@hole_update_view');
$router->post('/hole/update/{id}', 'SUController@hole_update_content');
$router->get('/hole/delete/{id}', 'SUController@delete');
$router->get('/insert', 'SUController@insertView');
$router->post('/insert', 'SUController@insert');

// tests
$router->get('/authTest', 'SUController@authTest');
$router->get('/guestTest', 'AuthController@guestTest');