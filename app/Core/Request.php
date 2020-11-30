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
        //echo $ruta;
        //echo '<br>';
        //echo '<pre>';
        $this->searchURL($routes, $ruta);
        //var_dump($this->searchURL($routes, $ruta));
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
                        //return $route;
                        $this->setURL($route);
                    } else {
                    }
                } else {
                    //return $route;
                    $this->setURL($route);
                }
            } else {
                foreach ($routes['groups'] as $routeg) {
                    if ($routeg['alias'] == '/' . $url[1]) {
                        if (array_key_exists('midleware', $routeg)) {
                            $midle = new Midleware();
                            $metodo = $routeg['midleware'];
                            if ($midle->$metodo()) {
                                foreach ($routeg['routes'] as $routegu) {
                                    if ($routegu['url'] == '/' . $url[2] && $this->validRequestHTTP($routegu)) {
                                        //return $routegu;
                                        $this->setURL($routegu);
                                    }
                                }
                            } else {
                            }
                        } else {
                            foreach ($routeg['routes'] as $routegu) {
                                if ($routegu['url'] == '/' . $url[2] && $this->validRequestHTTP($routegu)) {
                                    //return $routegu;

                                    $this->setURL($routegu);
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

    public function getController()
    {
        return $this->controller;
    }

    public function getClase()
    {
        return $this->clase;
    }

    public function send()
    {
        $controller = $this->getController();
        $clase = $this->getClase();

        $response = call_user_func([
            new $controller,
            $clase
        ]);

        try {
            if ($response instanceof Response) {
                $response->send();
            } else {
                throw new \Exception("Error Processing Request", 1);
            }
        } catch (\Exception $e) {
            echo "Details {$e->getMessage()}";
        }
    }
}
