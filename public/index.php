<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST");
date_default_timezone_set('America/Mexico_City');
require '../vendor/autoload.php';
$routes = [
    'urls' => [
        [
            'url' => '/products',
            'method' => 'GET',
            //'midleware' => 'auth',
            'controller' => ['App\Http\Controllers\HomeController', 'index'],
        ]
    ],
    'errors' => [
        [
            'url' => '/error',
            'method' => 'GET',
            //'midleware' => 'auth',
            'controller' => ['App\Http\Controllers\ErrorController', 'index'],
        ]
    ],
    'groups' => [
        [
            "alias" => '/users',
            //'midleware' => 'auth',
            "routes" => [
                [
                    'url' => '/add',
                    'method' => 'POST',
                    'controller' => ['App\Http\Controllers\HomeController', 'add'],
                ],
                [
                    'url' => '/get',
                    'method' => 'GET',
                    'controller' => ['App\Http\Controllers\HomeController', 'get'],
                ],
                [
                    'url' => '/edit',
                    'method' => 'POST',
                    'controller' => ['App\Http\Controllers\HomeController', 'edit'],
                ]
            ]
        ],
        [
            "alias" => '/v1',
            "routes" => [
                [
                    'url' => '/tabla/add',
                    'method' => 'GET',
                    'controller' => 'App\Http\Controllers\HomeController@index',
                    'midleware' => 'auth'
                ],
                [
                    'url' => '/tabla/edit',
                    'method' => 'GET',
                    'controller' => 'App\Http\Controllers\HomeController@index',
                    'midleware' => 'auth'
                ]
            ]
        ]
    ]
];


$app = new App\Core\Request($routes);
$app->send();
