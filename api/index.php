<?php
require 'Slim/Slim.php';
//require 'Slim/Middleware.php';
//require 'Slim/Extras/Middleware/HttpBasicAuth.php';
//require 'Slim/Extras/Middleware/OAuth2Auth.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
// $app->add(new \Slim\Extras\Middleware\HttpBasicAuth('mauricabrera', 'm'));
// Add OAuth middleware

define("SPECIALCONSTANT", true);
require 'app/libs/connect.php';
require 'app/routes/api.php';


$app->run();
?>