<?php

$app->get('/products', 'ProductsController:getProducts');
$app->post('/products', 'ProductsController:insertProducts');
$app->put('/products/{productCode}', 'ProductsController:updateProduct');

?>