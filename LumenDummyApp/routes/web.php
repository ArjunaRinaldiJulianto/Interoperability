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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/employees', 'EmployeesController@getEmployee');
$router->get('/employees/{id}', 'EmployeesController@getEmployeeById');
$router->get('/employeescreate', 'EmployeesController@createEmployee');
$router->post('/employees', 'EmployeesController@storeEmployee');
$router->get('/employees/{id}/edit', 'EmployeesController@editEmployee');
$router->put('/employees/{id}', 'EmployeesController@updateEmployee');
$router->delete('/employees/{id}', 'EmployeesController@deleteEmployee');