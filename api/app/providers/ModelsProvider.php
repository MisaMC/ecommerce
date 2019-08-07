<?php

$container['EmployeesModel'] = function($container) {
  return new app\Models\EmployeesModel($container);
};

$container['ProductsModel'] = function($container) {
  return new app\Models\ProductsModel($container);
};

$container['CustomersModel'] = function($container) {
  return new app\Models\CustomersModel($container);
};

$container['OfficesModel'] = function($container) {
  return new app\Models\OfficesModel($container);
};

$container['OrderModel'] = function($container) {
  return new app\Models\OrderModel($container);
};

$container['LoginModel'] = function($container) {
  return new app\Models\LoginModel($container);
};

?>