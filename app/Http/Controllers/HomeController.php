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
    return json($data);
  }
  public function json()
  {
    return view('home');
  }
}
