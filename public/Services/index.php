<?php

require_once "../../vendor/autoload.php";
require_once "people.class.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new \Silex\Application();
$app['debug'] = true;

/*
 * Description:
 * - Declaring the Service
 * - At the moment the people object is not instantiated.
 */
$app['pessoa'] = function() use($app){
    return new \people('Wellington Ribeiro', 'DevWellington@gmail.com');
};

/*
 * Description:
 * - Instantiating the service
 * - If more than one object to be instantiated
 *      in the scope of the role, all will be instantiated at this point.
 */
$pessoa = $app['pessoa'];

/*
 * Description:
 * - Passing object to the route
 */
$app->get('/', function() use($pessoa) {
    return "Name: " . $pessoa->getName() . "<br />".
           "eMail: " . $pessoa->getEmail(). "<br />";
});

$app->run();