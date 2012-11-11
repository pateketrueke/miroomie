<?php

class home_controller extends base_controller
{

  function login()
  {
    try {
      FB::initialize();
      if ($set = FB::me()) {
        session('fb_me', $set);
      }
    } catch (Exception $e) {
      redirect(url_for('login'));
    }
    redirect('demo');
  }

  function logout()
  {
    session('fb_me', NULL);
    foreach (array_keys($_COOKIE) as $one) {
      setcookie($one, '', -time(), '/', \Postman\Request::env('SERVER_NAME'));
    }
    redirect(FB::get_logout_url(array('next' => 'http://miroomie.co')));
  }

  function index()
  {
    is_logged() && redirect(url_for('demo'));
  }

  function demo()
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
