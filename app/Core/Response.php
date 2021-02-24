<?php

namespace App\Core;

class Response
{
  protected $view; //array, json, pdf..
  protected $type;
  protected $data;

  public function __construct($view, $type, $data = [])
  {
    $this->view = $view; //home, contact
    $this->data = $data;
    $this->type = $type;
  }

  public function getView()
  {
    return $this->view;
  }

  public function getType()
  {
    return $this->type;
  }
  public function getData()
  {
    return $this->data;
  }

  public function send()
  {
    $view = $this->getView();
    $type = $this->getType();
    $data = $this->getData();
    switch ($type) {
      case 'html':
        viewPath($view);
        break;
      case 'json':
        viewJSON($data);
        break;
      default:
        # code...
        break;
    }
  }
}
