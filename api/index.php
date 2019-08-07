<?php
  header ('Access-Control-Allow-Credentials: true');
  header ('Access-Control-Allow-Origin: *');
  header ('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
  header ('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Method, Authorization');

  session_start();
  
  // Directorio de la App.
  $context_app = __DIR__;
  // var_dump($context_app); die();

  // Establecer el entorno.
  $env = 'development';

  // agregar ka cnfiguración de la App.
  require $context_app . '/app/app.php';

?>