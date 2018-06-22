<?php

$app= __DIR__;

require_once 'routes.php';

$route= new Route();
$controllers = $route->getController();

?>
