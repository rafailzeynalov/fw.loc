<?php


class Posts
{
    public function __construct()
    {
        echo 'Posts::__construct';
    }

    public function indexAction(){
        echo 'Posts::index';
    }
}