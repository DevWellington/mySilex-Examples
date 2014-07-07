<?php

require_once "../../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();
$app['debug'] = true;

/*
 * Description:
 * - Mount external Controllers file Application
 */
$app->mount('/blog', include 'includes/blog.php' );
$app->mount('/admin', include 'includes/admin.php' );

$app->run();