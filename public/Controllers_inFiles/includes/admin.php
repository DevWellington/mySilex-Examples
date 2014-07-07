<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * Description:
 * - Creating a factory for controllers
 *
 * - $admin
 */
$admin = $app['controllers_factory'];

/*
 * http://localhost:90/Controllers_inFiles/admin/
 *
 * Description:
 * - Simple example of controller
 * - Not based in $app->get() is $admin->get()
 */
$admin->get('/', function(){
    return new Response("Pagina Administrativa");
});

/*
 * http://localhost:90/Controllers_inFiles/admin/config
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

return $admin;