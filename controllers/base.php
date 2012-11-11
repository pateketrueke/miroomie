<?php

class base_controller extends \Sauce\App\Controller
{

  public $title = 'Roomie';

  public function __construct()
  {
    try {
      FB::initialize();
    } catch (Exception $e) {
      redirect();
    }
  }

}
