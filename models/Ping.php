<?php

class Ping extends \Servant\Mapper\MongoDB
{

  const CONNECTION = '';

  static $columns = array(
    'to_uid' => array('string'),
    'from_uid' => array('string'),
    'created_at' => array('timestamp'),
  );

}
