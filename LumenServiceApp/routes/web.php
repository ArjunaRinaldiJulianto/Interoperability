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