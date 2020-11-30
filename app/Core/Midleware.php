<?php

namespace App\Core;

class Midleware
{
    public function auth()
    {
        $header = apache_request_headers();
        return ($header['Authorization'] == 'asdsadsad') ? true : false;
    }
}
