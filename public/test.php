<?php

require_once 'rb.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass'], $options);
R::freeze(true);
R::fancyDebug(true);

// Create
//$cat = R::dispense('category');
//$cat->title = 'Категория 3';
//$id = R::store($cat);
//var_dump($id);

// Read
//$cat = R::load('category', 3);
//echo $cat['title'];

// Update
//$cat = R::load('category', 3);
//echo $cat['title'] . '<br>';
//$cat->title = 'Категория 333';
//R::store($cat);
//echo $cat['title'] . '<br>';
//$cat = R::dispense('category');
//$cat->title = 'Категория 3!!!';
//$cat->id = 3;
//R::store($cat);

// Delete
//$cat = R::load('category', 3);
//R::trash($cat);
//
//R::wipe('category');

//$cats = R::findAll('category');
//$cats = R::findAll('category', 'id > ?', [2]);
//$cats = R::findAll('category', 'title LIKE ?', ['%cat%']);
$cat = R::findOne('category', 'id = 2');
echo '<pre>';
print_r($cat);