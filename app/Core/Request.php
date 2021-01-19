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
        //$ruta = explode('/', $_SERVER['REQUEST_URI']);
        $ruta = (!empty($_GET['url']) ? '/' . $_GET['url'] : '/');
        //echo $ruta;
        //echo '<br>';
        //echo '<pre>';
        //var_dump($routes['default'][0]);
        $this->searchURL($routes, $ruta);
        //var_dump($this->searchURL($routes, $ruta));
    }

    function searchURL($routes, $position)
    {
        $url = explode('/', $position);
        //var_dump($url);
        foreach ($routes['urls'] as $route) {
            if (in_array('/' . $url[1], $route) && $this->validRequestHTTP($route)) {
                if (array_key_exists('midleware', $route)) {
                    $midle = new Midleware();
                    $metodo = $route['midleware'];
                    if ($midle->$metodo()) {
                        //return $route;
                        $this->setURL($route);
                    } else {
                        //$this->setURL($routes['default'][0]);
                    }
                } else {
                    $this->setURL($route);
                }
            } else if (!in_array('/' . $url[1], $route) && count($routes['groups']) > 0) {
                foreach ($routes['groups'] as $routeg) {
                    if (in_array('/' . $url[1], $routeg)) {
                        if (array_key_exists('midleware', $routeg)) {
                            $midle = new Midleware();
                            $metodo = $routeg['midleware'];
                            if ($midle->$metodo()) {
                                foreach ($routeg['routes'] as $routegu) {
                                    if (in_array('/' . $url[2], $routegu) && $this->validRequestHTTP($routegu)) {
                                        //return $routegu;
                                        $this->setURL($routegu);
                                    } else {
                                    }
                                }
                            } else {
                            }
                        } else {
                            foreach ($routeg['routes'] as $routegus) {

                                if (in_array('/' . $url[2], $routegus) && $this->validRequestHTTP($routegus)) {

                                    //return $routegus;
                                    //var_dump($routegus);
                                    $this->setURL($routegus);
                                } else {
                                }
                            }
                        }
                    } /**/
                }
            } else {
                $this->setURL($routes['errors'][0]);
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
        //var_dump($route);
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

        try {
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
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
