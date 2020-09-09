<?php
use app\main\App;
class m_0102_add_column_password
{

    public function up()
    {
        $db = App::$app->db->pdo;
        
        $db->exec("
            ALTER TABLE user ADD COLUMN password VARCHAR(512)
        ");
    }

    public function down()
    {
        $db = App::$app->db->pdo;
        
        $db->exec("
            DROP COLUMN password 
        ");
    }
}