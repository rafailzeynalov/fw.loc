<?php
namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{

//    public $layout = 'main';
    public function indexAction(){
//        App::$app->getList();
        \R::fancyDebug(true);
        $model = new Main;
        $posts = App::$app->cache->get('posts');
        if(!$posts){
            $posts = \R::findAll('posts');              // если данных, то мы их получаем
            App::$app->cache->set('posts', $posts, 3600*24); // и записываем в кэш
        }
//        echo date('Y-m-d H:i', time());
//        echo '<br>';
//        echo date('Y-m-d H:i', 1601556411);
//        echo '<br>';

        $post = \R::findOne('posts', 'id = 1');
        $menu = $this->menu;
        $title = 'PAGE TITLE';
        $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $meta = $this->meta;
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    public function testAction(){
        debug($this->route);
        $this->layout = 'test';

    }

}
