<?php


class PostsNew
{
    public function __construct()
    {
        echo 'PostsNew::__construct';
    }


    public function indexAction(){
        echo 'PostsNew::index';
    }

    public function testAction(){
        echo 'test';
    }

    public function testPageAction(){
        echo 'testPage';
    }

    public function before(){
        echo 'Posts::before';
    }
}