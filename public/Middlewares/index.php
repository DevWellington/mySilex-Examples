<?php

require_once "../../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new \Silex\Application();
$app['debug'] = true;

/*
 * http://localhost:90/Middlewares/
 *
 * Description:
 * - Simple example - Middlewares
 */
$app->get('/', function(){
    return new Response("Middlewares - <strong>Main Route</strong><br />", 200);
});

/*
 * http://localhost:90/Middlewares/
 *
 * Description:
 * - Run before execution of route
 */
$app->before(function(Request $request){
    echo "Rodou antes<br />";
}, \Silex\Application::EARLY_EVENT);

/*
 * http://localhost:90/Middlewares/
 *
 * Description:
 * - Run after execution of route
 *      before response of browser
 */
$app->after(function(Request $request, Response $response){
    echo "Rodou depois<br />";
});

/*
 * http://localhost:90/Middlewares/
 *
 * Description:
 * - Executed in finish of application
 *      and after of response of browser
 */
$app->finish(function(){
    echo "Finalizou<br />";
});

/*
 * http://localhost:90/Middlewares/beforeThis/Name
 * http://localhost:90/Middlewares/beforeThis/
 *
 * Description:
 * - Executed BEFORE callback in route external function
 *
 */
$before = function(){
    echo "Executou antes do callback<br />";
};

$app->get('/beforeThis/{name}', function($name){
    return new Response("Ola Rota beforeThis - {$name}<br />", 200);
})
    ->value('name', 'Ribeiro')
    ->bind('beforeThis')
    ->before($before);

/*
 * http://localhost:90/Middlewares/afterThis/Name
 * http://localhost:90/Middlewares/afterThis/
 *
 * Description:
 * - Executed AFTER callback in route external function
 *
 */
$before = function(){
    echo "Executou antes do callback<br />";
};

$after = function(Request $request, Response $response) use($app){
    echo "Executou depois do callback<br />";
};

$app->get('/afterThis/{name}', function($name){
    return new Response("Ola Rota beforeThis - {$name}<br />", 200);
})
    ->value('name', 'Ribeiro')
    ->bind('afterThis')
    ->before($before)
    ->after($after);

/*
 * Execute app
 */
$app->run();