<?php

namespace app\Controllers;

class UserController extends Controller {

  function helloUser($request, $respond) {
    return json_encode(array('greetings' => 'Hello from the other side!!'));
  }

  function helloUserName($request, $respond) { 
    $name = $request->getAttribute('name');
    $message = $this->JWTService->getTokenUser($name);
    return json_encode(array('result' => $message));
  }
}

?>