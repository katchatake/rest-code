<?php

namespace App\Http\Models;

use App\Core\Database;

class UsersModel
{
  public function getUsers()
  {
    $model = new Database();
    $query = $model->con()->select("usuarios", "*");
    return $query;
  }
}
