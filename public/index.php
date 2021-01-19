<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST");
date_default_timezone_set('America/Mexico_City');
require '../vendor/autoload.php';
require '../app/routes.php';
/*$app = new App\Core\Request($route->getRoutes());
$app->send();*/
$ruta = explode('/', $_SERVER['REQUEST_URI']);
//$ruta = (!empty($_GET['url']) ? '/' . $_GET['url'] : '/');
//echo $ruta;
//echo '<br>';
echo '<pre>';
var_dump($_SERVER['REQUEST_URI']);
