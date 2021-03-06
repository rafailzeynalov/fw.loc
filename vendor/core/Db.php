<?php


namespace vendor\core;


class Db
{
    protected $pdo;
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        require_once LIBS . '/rb.php';
        $db = require ROOT . '/config/config_db.php';

        \R::setup($db['dsn'], $db['user'], $db['pass']);
        \R::freeze(true);
//        \ R::fancyDebug(true);

        $db = require ROOT . '/config/config_db.php';
//        $options = [
//            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
//            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
//        ];
//        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    public static function instance(){  // singletone
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Данный метод будет использоваться тогда, когда
     * надо выполнить запрос к БД, но результаты не нужны,
     * например создать таблицу в БД, когда интересует
     * выполнился ли запрос (true), или нет (false)
     */
//    public function execute($sql, $params = []){
//        self::$countSql++; // При каждом вызове ++
//        $stmt = $this->pdo->prepare($sql);
//        return $stmt->execute($params);
//    }
//
//    /**
//     * это, когда нужно получить данные из запроса
//     */
//    public function query($sql, $params = []){
//        self::$countSql++;
//        self::$queries[] = $sql; // При каждом запросе запоминается Sql
//        $stmt = $this->pdo->prepare($sql);
//        $res = $stmt->execute($params);
//        if($res !== false) {
//            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
//        }
//        return [];
//    }

}