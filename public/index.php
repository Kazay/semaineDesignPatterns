<?php

require_once '../vendor/autoload.php';
require_once '../config/config.php';

// setup Propel
require_once '../generated-conf/config.php';

use \Helper\Router as Router;

$router = new Router();
$router->dispatch();