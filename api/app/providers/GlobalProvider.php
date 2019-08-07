<?php

$container['db'] = function($container) {
  return new Medoo\Medoo($container['settings']['db']);
};

$container['jwt'] = function($container) {
  return new \Firebase\JWT\JWT;
};

?>