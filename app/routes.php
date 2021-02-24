<?php

$route = new App\Core\Router;


// $route->setRoute('/api', 'GET', '', ['App\Http\Controllers\HomeController', 'get']);
$route->setRoute('/', 'GET', '', ['App\Http\Controllers\HomeController', 'index']);
$route->setGroup('/v2', 'auth', function ($route) {
    $route->setRoute('/add', 'POST', '', ['App\Http\Controllers\HomeController', 'add']);
});
$route->setGroup('/v1', '', function ($route) {
    $route->setRoute('/exist', 'POST', '', ['App\Http\Controllers\HomeController', 'erjskdfjsdj']);
});
// $route->setRoute('/login', 'GET', 'auth', ['App\Http\Controllers\HomeController', 'index']);
