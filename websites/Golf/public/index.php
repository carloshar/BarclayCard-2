<?php
require '../autoload.php';

$routes = new \GolfStore\Routes();

$entryPoint = new \Backend\EntryPoint($routes);

$entryPoint->run();



