<?php
  $app->get('/greetings', 'UserController:helloUser');
  $app->get('/helloUser/{name}', 'UserController:helloUserName');

?>