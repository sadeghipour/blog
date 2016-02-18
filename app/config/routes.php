<?php
$router = new \Phalcon\Mvc\Router();

$router->setDefaultAction("index");
$router->setDefaultNamespace("App\Controllers\Blog");

$router->add(
    "/:action/:params",
    array(
        'namespace' => 'App\Controllers\Blog',
        "controller" => "index",
        "action" => 1,
        "params" => 2
    ))->convert('action', function ($action) {

    return getActionName($action);
});


$router->add(
    "/admin",
    array(
        'namespace' => 'App\Controllers\Admin',
        "controller" => "index",
        "action" => "login"
    ))->convert('action', function ($action) {
    return getActionName($action);
});

$router->add(
    "/admin/",
    array(
        'namespace' => 'App\Controllers\Admin',
        "controller" => "index",
        "action" => "login"
    ))->convert('action', function ($action) {
    return getActionName($action);
});

$router->add(
    "/admin/:action/:params",
    array(
        'namespace' => 'App\Controllers\Admin',
        "controller" => "index",
        "action" => 1,
        "params"=> 2
    ))->convert('action', function ($action) {
    return getActionName($action);
});

$router->add(
    "/posts/:params",
    array(
        'namespace' => 'App\Controllers\Blog',
        "controller" => "index",
        "action" => "posts",
        "params"=>1
    ))->convert('action', function ($action) {
    return getActionName($action);
});

$router->add(
    "/api/:action/:params",
    array(
        'namespace' => 'App\Controllers\Blog',
        "controller" => "api",
        "action" => 1,
        "params" => 2
    ))->convert('action', function ($action) {
    return getActionName($action);
});

function getActionName($action)
{
    return lcfirst(\Phalcon\Text::camelize($action));
}

$router->handle();
