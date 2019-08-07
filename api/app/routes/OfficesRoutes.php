<?php

$app->get('/offices', 'OfficesController:getOffices');
$app->post('/offices', 'OfficesController:insertOffices');
$app->put('/offices/{officeCode}', 'OfficesController:updateOffices');

?>