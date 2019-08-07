<?php

$app->get('/employees', 'EmployeesController:getEmployees');
$app->post('/employees', 'EmployeesController:insertEmployees');
$app->put('/employees/{employeeNumber}', 'EmployeesController:updateEmployees');
$app->get('/employee/{employeeNumber}', 'EmployeesController:getEmployee');

?>