<?php

require_once __DIR__ . '/Controller.php';

class LongreadController extends Controller
{
  function __construct()
  {
  }

  public function neuromancer()
  {
    $data = array();

    $data['intro'] = 'cyberspace';
    $data['author'] = 'William Gibson';
    $data['book'] = 'Neuromancer';

    $this->set('data', $data);
  }
}
