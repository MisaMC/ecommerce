<?php
  require $context_app . '/vendor/autoload.php';

  // Agregar la configuración de la aplicación.
  $settings = require $context_app . '/app/settings.php';

  if ($env == 'production') {
    $settings['displayErrorDetails'] = false;
  }

  $app = new \Slim\App(
    array('settings' => $settings)
  ); // Creación de la instancia de Slim.

  // Container  de Slim.
  $container = $app->getContainer();

  // Providers.
  $providers = $context_app . '/app/providers/*.php';
  foreach(glob($providers) as $filename) require $filename;
  
  // Routes.
  $routes = $context_app . '/app/routes/*.php';
  foreach (glob($routes) as $filename) require $filename;

  $app->run();

?>