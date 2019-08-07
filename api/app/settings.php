<?php
  // Confifuración  de la base de datos.
  $db = require $context_app . '/app/database/config.php';

  // key de encriptación
  $jwt = array('key' => 'W&qp]hbzGN$F7(_J', 'algorithms' => array('HS256'));

  // Configuracion de la App.
  $settings = array(
    'displayErrorDetails' => true,
    'determineRouteBeforeAppMiddleware' => true,
    'db' => $db,
    'jwt' => $jwt
  );

  // se Agrega el contexto de al app.
  $settings['context'] = $context_app;
  // var_dump($settings); die();
  return $settings;
?>
