<?php

use Router\Router;

spl_autoload_register();

$router = new Router($_SERVER['PATH_INFO']);
$router->checkRoute($_SERVER['PATH_INFO']);

?>