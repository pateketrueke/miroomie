<?php

class home_controller extends base_controller
{

  public function index()
  {
    if ($q = params('q')) {
      $options['where']['details.address LIKE'] = "%$q%";
      $options['where']['uid !'] = current_user()->uid;
      $options['where']['is_available'] = 'yes';
      #$options['where']['is_validated'] = 'yes';

      $this->view['results'] = User::all($options) ?: array();
    }
  }

}
