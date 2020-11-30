<?php

//if(! functon_exists('view')) {
function view($view)
{
  return new App\Core\Response($view, 'html');
}
//}

//if(! functon_exists('view')) {
function json($data)
{
  return new App\Core\Response('', 'json', $data);
}
//}

//if(! functon_exists('viewPath')) {
function viewPath($view)
{
  return __DIR__ . "/../../views/$view.php";
}
//}

//if(! functon_exists('viewPath')) {
function viewJSON($data)
{
  header('Content-Type: application/json;charset=utf-8');
  echo json_encode($data);
}
//}