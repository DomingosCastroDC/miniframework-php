<?php
use app\main\App;
class m_0101
{

    public function up()
    {
        $db = App::$app->db->pdo;
        
        $db->exec("
            CREATE TABLE IF NOT EXISTS user (
                id INT AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(512),
                lastname VARCHAR(512),
                email VARCHAR(255),
                status INT DEFAULT 0
            )ENGINE=INNODB;
        ");
    }

    public function down()
    {
        $db = App::$app->db->pdo;
        
        $db->exec("
            DROP TABLE user 
        ");
    }
}