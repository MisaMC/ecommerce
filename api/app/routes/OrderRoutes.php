<?php

$app->post('/orders', 'OrderController:insertOrder');

$app->get('/orders', 'OrderController:getOrder');

$app->get('/order-details', 'OrderController:getOrdersDetails');

?>