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
            'url' => '/',
            'method' => 'GET',
            'midleware' => 'auth',
            'controller' => ['App\Http\Controllers\HomeController', 'index'],
        ]
    ],
    'groups' => [
        [
            "alias" => '/admin',
            'midleware' => 'auth',
            "routes" => [
                [
                    'url' => '/users',
                    'method' => 'GET',
                    'controller' => ['App\Http\Controllers\HomeController', 'index'],
                ],
                [
                    'url' => '/tabla/edit',
                    'method' => 'GET',
                    'controller' => 'App\Http\Controllers\HomeController@index',
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
