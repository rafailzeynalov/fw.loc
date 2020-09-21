<?php


namespace vendor\core\base;

use vendor\core\Db;

abstract class Model{

    protected $pdo;
    protected $table;  // Имя таблицы,с которой будет работать та или иная модель

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    // обертка метода execute
    public function query($sql){
        return ;$this->pdo->execute($sql);
    }

    // Возвращает все данные из таблицы (с которой работает модель
    public function findAll(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

}
