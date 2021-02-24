<?php

namespace App\Core;

use App\Http\Models\Midelwares;

class Midleware
{
    public function auth()
    {
        try {
            $query = new Midelwares();
            $header = apache_request_headers();
            $data = $query->valid(!empty($header['Authorization']));

            return ($data) ? true : false;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
