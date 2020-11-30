<?php

namespace App\Core;

use Medoo\Medoo;

class Database
{
    public function __construct()
    {
        return new Medoo([
            'database_type' => 'mysql',
            'database_name' => DBNAME,
            'server' => 'localhost',
            'username' => DBUSER,
            'password' => DBPASS,
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci'
        ]);
    }
}
