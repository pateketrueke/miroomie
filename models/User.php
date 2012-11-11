<?php

class User extends \Servant\Mapper\MongoDB
{

  const CONNECTION = '';

  static $columns = array(
    'uid' => array('string'),
    'email' => array('string'),
    'details' => array('array'),
    'is_validated' => array('string'),
    'is_available' => array('string'),
    'created_at' => array('timestamp'),
    'updated_at' => array('timestamp'),
  );


  public function set_details($value)
  {
    $set = $this->attr('details') ?: array();
    $set = array_merge($set, $value);
    $this->attr('details', $set);
  }

}
