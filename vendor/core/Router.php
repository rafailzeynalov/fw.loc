<?php
namespace vendor\core;

class Router
{
    protected static $routes = [];  // Таблица маршрутов
    protected static $route = [];   // Текущий маршрут, который вызывается по текущему URL

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function getRoute() {
        return self::$route;
    }

    public static function matchRoute($url){
        /** Ищет URL в таблице маршрутов */
        foreach(self::$routes as $pattern => $route){
            if(preg_match("#$pattern#i", $url, $matches)) {
                foreach($matches as $k => $v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Перенаправляет URL по корректному маршруту
     * @param string $url входящий URL
     * @return void
     */
    public static function dispatch($url){
        $url = self::removeQuerySting($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['controller'];
            if(class_exists($controller)){
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj, $action)){
                    $cObj->$action();
                    $cObj->getView();
                }else{
                    echo "Метод  <b>Метод $controller::$action не найден</b>";
                }
            }else{
                echo "Controller <b>$controller not found</b>";
            }

        }else{
            http_response_code(404);
            include '404.html';
        }
    }

    protected static function upperCamelCase($name){
//        $name = str_replace('-', ' ', $name);
//        $name = ucwords($name);
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }

    /** обрезает GET параметры */
    protected static function removeQuerySting($url){
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
        debug($url);
        return $url;
    }
}