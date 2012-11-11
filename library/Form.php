<?php

class Form
{
  public static function __callStatic($method, $arguments)
  {
    return call_user_func_array("\\Labourer\\Web\\Form::$method", $arguments);
  }
}
