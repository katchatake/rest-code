<?php

namespace App\Http\Controllers;

class ErrorController
{
  public function index()
  {
    return view('error');
  }
  public function json()
  {
    return view('error');
  }
}
