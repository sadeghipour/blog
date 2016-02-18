<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
/*$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir
    )
)->register();*/


$loader->registerNamespaces(array(

    "App\Controllers\Admin"=> __DIR__."/../controllers/Admin",
    "App\Controllers\Blog"=> __DIR__."/../controllers/Blog",
    "App\Models"=> __DIR__."/../models",
    "App\Utility"=> __DIR__."/../utility",


))->register();