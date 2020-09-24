<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

//    public $layout = 'main';
    public function indexAction(){
        $model = new Main;
        $posts = \R::findAll('posts');
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
