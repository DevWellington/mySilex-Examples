<?php

require_once "../../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();
$app['debug'] = true;

/*
 * Description:
 * - Creating a factory for controllers
 *
 * - $blog
 */
$blog = $app['controllers_factory'];

/*
 * http://localhost:90/Controllers/blog/
 *
 * Description:
 * - Simple example of controller
 * - Not based in $app->get() is $blog->get()
 *
 * - /blog
 */
$blog->get('/', function(){
    return new Response("Pagina principal | Blog");
});

/*
 * http://localhost:90/Controllers/article/
 *
 * Description:
 * - Simple example of controller
 * - Not based in $app->get() is $blog->get()
 *
 * - Using route /blog/article
 */
$blog->get('/article', function(){
    return new Response("Artigo do Blog");
});


/*
 * Description:
 * - Creating a factory for controllers
 *
 * - $admin
 */
$admin = $app['controllers_factory'];

/*
 * http://localhost:90/Controllers/admin/
 *
 * Description:
 * - Simple example of controller
 * - Not based in $app->get() is $admin->get()
 */
$admin->get('/', function(){
    return new Response("Pagina Administrativa");
});

/*
 * http://localhost:90/Controllers/admin/config
 *
 * Description:
 * - Simple example of controller
 * - Not based in $app->get() is $admin->get()
 *
 * - Using route /admin/config
 */
$admin->get('/config', function(){
    return new Response("Pagina de Configuracoes");
});

/*
 * Description:
 * - Mount controllers application
 */
$app->mount('/blog', $blog);
$app->mount('/admin', $admin);

$app->run();