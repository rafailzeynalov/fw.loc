<?php
namespace app\controllers;

class Main extends App
{
    public $layout = 'main';
    public function indexAction(){
//        echo 111;
//        $this->layout =false;
//        $this->layout = 'main';
//        $this->view = 'test';
        $name ='Rafail';
        $hi = 'Hello';
        $colors = [
            'white' => 'Белый',
            'black' => 'Черный'
        ];
        $title = 'PAGE TITLE';
        $this->set(compact('hi','name', 'colors', 'title'));
    }
}
