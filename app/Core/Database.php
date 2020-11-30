<?php

namespace App\Core;

use Medoo\Medoo;

class Database
{
    protected $db;
    public function __construct()
    {
        // $this->db =  new Medoo([
        //     'database_type' => 'mysql',
        //     'database_name' => DBNAME,
        //     'server' => 'localhost',
        //     'username' => DBUSER,
        //     'password' => DBPASS,
        //     'charset' => 'utf8',
        //     'collation' => 'utf8_general_ci'
        // ]);
    }
    public function con()
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
