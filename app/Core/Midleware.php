<?php

namespace App\Core;

use App\Http\Models\Midelwares;

class Midleware
{
    public function auth()
    {
        $query = new Midelwares();
        $header = apache_request_headers();
        $data = $query->valid($header['Authorization']);

        return ($data) ? true : false;
    }
}
