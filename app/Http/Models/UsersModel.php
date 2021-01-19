<?php

namespace App\Http\Models;

use App\Core\Database;

class UsersModel
{
  public function getUsers()
  {
    $model = new Database();
    $query = $model->con()->select("users", "*");
    return $query;
  }
  public function addUsers($data)
  {
    $model = new Database();
    $query = $model->con()->insert("users", [
      'userName' => $data['userName'],
      'userEmail' => $data['userEmail'],
      'userPass' => $data['userPass'],
      'userStatus' => $data['userStatus']
    ]);
    return ($query) ? true : false;
  }
}
