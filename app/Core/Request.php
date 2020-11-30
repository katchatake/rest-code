<?php

namespace App\Core;

use App\Core\Midleware;

class Request
{
    protected $url;
    protected $method;
    protected $data;
    protected $controller;
    protected $clase;
    protected $midelware;

    public function __construct($routes)
    {
        $ruta = (!empty($_GET['url']) ? '/' . $_GET['url'] : '/');
        echo $ruta;
        //echo '<br>';
        echo '<pre>';
        var_dump($this->searchURL($routes, $ruta));
    }

    function searchURL($routes, $position)
    {
        $url = explode('/', $position);
        foreach ($routes['urls'] as $route) {
            if ($route['url'] == '/' . $url[1] && $this->validRequestHTTP($route)) {
                if (array_key_exists('midleware', $route)) {
                    $midle = new Midleware();
                    $metodo = $route['midleware'];
                    if ($midle->$metodo()) {
                        return $route;
                    } else {
                    }
                } else {
                    return $route;
                }
            } else {
                foreach ($routes['groups'] as $routeg) {
                    if ($routeg['alias'] == '/' . $url[1] && $this->validRequestHTTP($routeg)) {
                        if (array_key_exists('midleware', $routeg)) {
                            $midle = new Midleware();
                            $metodo = $routeg['midleware'];
                            if ($midle->$metodo()) {
                                foreach ($routeg['routes'] as $routegu) {
                                    if ($routegu['url'] == '/' . $url[2]) {
                                        return $routegu;
                                    }
                                }
                            } else {
                            }
                        } else {
                            foreach ($routeg['routes'] as $routegu) {
                                if ($routegu['url'] == '/' . $url[2]) {
                                    return $routegu;
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    public function validRequestHTTP($request)
    {
        return ($request['method'] === $_SERVER['REQUEST_METHOD']) ? true : false;
    }

    public function setURL($route)
    {
        $this->method = $route['method'];
        $this->url = $route['url'];
        $this->controller = $route['controller'][0];
        $this->clase = $route['controller'][1];
    }
}
