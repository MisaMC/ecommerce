<?php

$app->get('/customers', 'CustomersController:getCustomers');
$app->post('/customers', 'CustomersController:insertCustomers');
$app->put('/customers/{customerNumber}', 'CustomersController:updateCustomers');

?>