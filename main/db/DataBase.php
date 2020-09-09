<?php
namespace app\main\db;

use app\main\App;
class DataBase 
{
    public \PDO $pdo;

    public function __construct(array $config = [])
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new \PDO($dsn,$user,$password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        
    }

    public static function prepare($sql)
    {
        return App::$app->db->pdo->prepare($sql);
    }
}