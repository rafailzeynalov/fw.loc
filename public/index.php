<?php
error_reporting(-1);

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');  // Получаем строку запроса

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/vendor/core');
define('APP', ROOT . '/app');
define('LAYOUT', 'default');

require_once '../vendor/libs/functions.php';

spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
}

);


Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']); // Наше особое правило должно быть раньше
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']); // 1-е правило
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);

