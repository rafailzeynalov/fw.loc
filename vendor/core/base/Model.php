<?php


namespace vendor\core\base;

use vendor\core\Db;

abstract class Model{

    protected $pdo;
    protected $table;  // Имя таблицы,с которой будет работать та или иная модель
    protected $pk = 'id'; // имя поля первичного ключа

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

    public function findOne($id, $field = ''){
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = []){
        return $this->pdo->query($sql, $params);
    }

    public function findLike($str, $field, $table = ''){
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql, ['%' . $str . '%']);
    }

}
