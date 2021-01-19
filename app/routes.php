<?php

$route = new App\Core\Router;


$route->setRoute('/', 'GET', '', ['App\Http\Controllers\HomeController', 'index']);
$route->setGroup('/api', 'auth', function ($route) {
    $route->setRoute('/add', 'POST', '', ['App\Http\Controllers\HomeController', 'add']);
});
$route->setGroup('/v1', '', function ($route) {
    $route->setRoute('/exist', 'POST', '', ['App\Http\Controllers\HomeController', 'erjskdfjsdj']);
});
$route->setRoute('/login', 'GET', 'auth', ['App\Http\Controllers\HomeController', 'index']);
