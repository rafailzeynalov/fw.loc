<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');  // Получаем строку запроса

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/vendor/core');
define('APP', ROOT . '/app');

require_once '../vendor/core/Router.php';
require_once '../vendor/libs/functions.php';
//require_once '../app/controllers/Main.php';
//require_once '../app/controllers/Posts.php';
//require_once '../app/controllers/PostsNew.php';

spl_autoload_register(function($class){
    $file = APP . "/controllers/$class.php";
    if(is_file($file)){
        require_once $file;
    }
}

);


Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts']); // Наше особое правило должно быть раньше

// default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']); // 1-е правило
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());




Router::dispatch($query);

