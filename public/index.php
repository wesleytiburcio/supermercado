<?php 

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR );
define('APP', ROOT . 'App' . DIRECTORY_SEPARATOR);

require ROOT . 'vendor/autoload.php';

require APP . 'config/config.php';

use App\Core\Application;

$app = new Application(); 