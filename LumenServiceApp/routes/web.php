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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

// Latihan Pertemuan 3
$router->get('/hello-lumen', function() {
    return "<h1>Lumen</h1><p>Hi good developer, thank for useing Lumen</p>";
});
$router->get('/hello-lumen/{name}', function($name) {
    return "<h1>Lumen</h1><p>Hi <b>" . $name ."</b>, thank for useing Lumen</p>";
});
$router->get('/scores', ['middleware' => 'login', function () { 
    return "<h1>Selamat</h1> <p>Nilai anda 100</p>";
}]);
$router->get('/user', 'UserController@index');

// Tugas Pertemuan 3
// 1.	Silahkan membuat 5 routing, 5 middleware dan 5 controller dengan kasus yang berbeda.
// 5 routing middleware
$router->get('/direktur', ['middleware' => 'login.role0', function () { 
    return "<h1>Selamat</h1> <p>Anda Login Dengan Akun Direktur</p>";
}]);
$router->get('/wakildirektur', ['middleware' => 'login.role1', function () { 
    return "<h1>Selamat</h1> <p>Anda Login Dengan Akun Wakil Direktur</p>";
}]);
$router->get('/manajer', ['middleware' => 'login.role2', function () { 
    return "<h1>Selamat</h1> <p>Anda Login Dengan Akun Manajer</p>";
}]);
$router->get('/supervisor', ['middleware' => 'login.role3', function () { 
    return "<h1>Selamat</h1> <p>Anda Login Dengan Akun Supervisor</p>";
}]);
$router->get('/pegawai', ['middleware' => 'login.role4', function () { 
    return "<h1>Selamat</h1> <p>Anda Login Dengan Akun Pegawai</p>";
}]);

// 5 routing controller
$router->get('/home', 'HomeController@index');
$router->get('/about', 'AboutController@about');
$router->get('/profile', 'ProfileController@profile');
// $router->get('/tes', ['middleware' => 'login', 'ProfileController@profile']);
$router->get('/produk', 'ProdukController@getProduk');
$router->get('/produk/{produkId}', 'ProdukSearchController@getProdukById');

// 2. Silahkan anda membuat routing seperti dibawah ini.
$router->get('/', 'UsersController@getStatus');
$router->get('/users', 'UsersController@getUsers');
$router->get('/users/{userId}', 'UsersController@getUsersById');


// Tugas Pertemuan 4
// Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
// $router->get('/posts', 'PostsController@index');
$router->get('/category','CategoriesController@index');
$router->get('/tag','TagsController@index');
// $router->get('/product','ProductsController@index');
// $router->get('/order', 'OrdersController@index');


// Tugas Pertemuan 5
//1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
//2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
$router->get('/posts', 'PostsController@index');
$router->post('/posts', 'PostsController@store');
$router->get('/posts/{id}', 'PostsController@show');
$router->put('/posts/{id}', 'PostsController@update');
$router->delete('/posts/{id}', 'PostsController@destroy');

$router->get('/product','ProductsController@index');
$router->post('/product','ProductsController@store');
$router->get('/product/{id}','ProductsController@show');
$router->put('/product/{id}','ProductsController@update');
$router->delete('/product/{id}','ProductsController@destroy');

$router->get('/order', 'OrdersController@index');
$router->post('/order', 'OrdersController@store');
$router->get('/order/{id}', 'OrdersController@show');
$router->put('/order/{id}', 'OrdersController@update');
$router->delete('/order/{id}', 'OrdersController@destroy');

$router->get('/customer', 'CustomersController@index');
$router->post('/customer', 'CustomersController@store');
$router->get('/customer/{id}', 'CustomersController@show');
$router->put('/customer/{id}', 'CustomersController@update');
$router->delete('/customer/{id}', 'CustomersController@destroy');

$router->get('/seller', 'SellersController@index');
$router->post('/seller', 'SellersController@store');
$router->get('/seller/{id}', 'SellersController@show');
$router->put('/seller/{id}', 'SellersController@update');
$router->delete('/seller/{id}', 'SellersController@destroy');
