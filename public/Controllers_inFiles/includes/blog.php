<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * Description:
 * - Creating a factory for controllers
 *
 * - $blog
 */
$blog = $app['controllers_factory'];

/*
 * http://localhost:90/Controllers_inFiles/blog
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
 * http://localhost:90/Controllers_inFiles/blog/article
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

return $blog;