<?php

class roomie_controller extends base_controller
{

  function update()
  {
    $user = current_user();

    $user->details = params('detail');
    $user->is_available = params('available');
    $user->save();

    redirect(url_for('my_profile'));
  }

  function requests()
  {
    $uid = current_user()->uid;

    $this->view['sent_requests'] = Ping::all_by_from_uid($uid);
    $this->view['recvd_requests'] = Ping::all_by_to_uid($uid);
  }

  function view_request()
  {
    ;
  }

  function cancel_request()
  {
    $from_uid = current_user()->uid;
    $to_uid = params('id');

    if ($tmp = Ping::first_by_from_uid_and_to_uid($from_uid, $to_uid)) {
      $tmp->delete();
    }
    redirect();
  }

  function create_request()
  {
    $to_uid = params('id');
    $from_uid = current_user()->uid;

    Ping::find_or_create_by_from_uid_and_to_uid($from_uid, $to_uid);
    redirect();
  }

  function accept_request()
  {
    $from_uid = params('id');
    $to_uid = current_user()->uid;
    die('AQUI HACEMOS LO QUE FALTA');
    Ping::find_or_create_by_from_uid_and_to_uid($from_uid, $to_uid);
    redirect(url_for('view_requests'));
  }

  function decline_request()
  {
    $from_uid = params('id');
    $to_uid = current_user()->uid;

    if ($tmp = Ping::first_by_from_uid_and_to_uid($from_uid, $to_uid)) {
      $tmp->delete();
    }
    redirect(url_for('view_requests'));
  }

}
