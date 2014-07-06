<?php

require_once "../../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();
$app['debug'] = true;

// array
$data = array(
    'nome' => 'Silex',
    'version' => '1.0.*@dev'
);

/*
 * http://localhost:90/getStarted/
 *
 * Description:
 * - simple example - Hello World
 */
$app->get('/', function(){
    return "Hello World!";
});

/*
 * http://localhost:90/getStarted/hello
 *
 * Description:
 * - Example Route
 */
$app->get('/hello', function(){
    return "Welcome to a route Silex !";
});

/*
 * http://localhost:90/getStarted/blog/RouteName
 *
 * Description:
 * - Dinamic route
 *
 * Parameters:
 * - 400 = HTTP Code - Not Ok (File Not found);
 */
$app->get('/blog/{id}', function(\Silex\Application $app, $id) use($data){

    if(!isset($data['phpVersion']))
        $app->abort(404, "Não encontrado");

    return $id;
});

/*
 * http://localhost:90/getStarted/app
 *
 * Description:
 * - Variables outside the scope
 *
 * Parameters:
 * - necessary: use($data)
 */
$app->get('/app', function() use($data){
    return "Welcome to {$data['nome']}! <br />-version: {$data['version']}";
});



// HTTP Codes

/*
 * http://localhost:90/getStarted/Response
 *
 * Description:
 * - Using \Response
 *
 * Parameters:
 * - 200 = HTTP Code - Ok
 */
$app->get('/Response', function(){
    return new Response('Olá Mundo!', 200);
});

/*
 * http://localhost:90/getStarted/convert/1
 *
 * Description:
 * - Using convert for convert get value
 *
 * Parameters:
 * - 200 = HTTP Code - Ok
 */
$app->get('/convert/{id}', function($id){
    return new Response("Olá Convert: {$id}", 200);
})->convert('id', function($id){
        return (int) $id;
    });


/*
 * http://localhost:90/getStarted/assert/1
 *
 * Description:
 * - Using assert for validate get values
 *
 * Parameters:
 * - \d+ = define digit
 * - 200 = HTTP Code - Ok
 */
$app->get('/assert/{id}', function($id){
    return new Response("Olá Assert: {$id}", 200);
})
    ->assert('id', '\d+');

/*
 * http://localhost:90/getStarted/value/Name -> 'Olá Value: Name'
 * http://localhost:90/getStarted/value -> 'Olá Value: Ribeiro'
 *
 * Description:
 * - Using value for define default value
 *
 * Parameters:
 * - value = Sets a default value
 * - 200 = HTTP Code - Ok
 */
$app->get('/value/{name}', function($name){
    return new Response("Olá Value: {$name}", 200);
})
    ->value('name', 'Ribeiro');


/*
 * http://localhost:90/getStarted/bind/Name -> 'Olá Bind: Name'
 * http://localhost:90/getStarted/bind -> 'Olá Bind: Ribeiro'
 *
 * Description:
 * - Using bind for define name of route
 *
 * Parameters:
 * - 200 = HTTP Code - Ok
 * - value = Sets a default value
 * - bind = Route name
 */
//
$app->get('/bind/{name}', function($name){
    return new Response("Olá Bind: {$name}", 200);
})
    ->value('name', 'Ribeiro')
    ->bind('rota_ribeiro');


$app->run();