<?php

namespace App\Http\Controllers;

use App\Http\Models\UsersModel;;

class HomeController
{
  public function index()
  {
    //return view('home');
    $query = new UsersModel();
    $data = $query->getUsers();
    $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    return json($array);
  }

  public function get()
  {
    //return view('home');
    $query = new UsersModel();
    $data = $query->getUsers();
    $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    return json($data);
  }
  public function add()
  {
    $query = new UsersModel();
    $data = $query->addUsers($_POST);
    return json(($data) ? 'Exito' : 'Fallido');
  }
  public function json()
  {
    return view('home');
  }
}
