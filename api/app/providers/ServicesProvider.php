<?php

$container['JWTService'] = function($container) {
  return new app\Services\JWTService($container);
};

?>