<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
//    public $layout = 'main';
    public function indexAction(){
        $model = new Main;
        $posts = $model->findAll();
//        $post = $model->findOne('Тестовый пост', 'title');
//        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%то%']);
        $data = $model->findLike('тов', 'title');
        debug($data);
        $title = 'PAGE TITLE';
        $this->set(compact('title', 'posts'));
    }

}
