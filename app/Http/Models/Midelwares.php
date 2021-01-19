<?php

namespace App\Http\Models;

use App\Core\Database;

class Midelwares
{
  public function valid($token)
  {
    $model = new Database();
    $query = $model->con()->select("ingreso", "*", ['key' => $token, 'estatus' => 1]);
    return ($query) ? true : false;;
  }
}
