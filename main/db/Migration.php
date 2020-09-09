<?php
namespace app\main\db;

use app\main\App;
class Migration
{

    public function applyingMigrations()
    {
        $this->createTableMigrations();
        $getTableMigrations = $this->getTableMigrations();

        $migrationsFile = scandir(App::$ROOT_PATH."/migrations");

        $getDiferences = array_diff($migrationsFile,$getTableMigrations);

        foreach ($getDiferences as $migrations) {
            $saveMigrations = [];
            if($migrations == '.' || $migrations == '..')
            {
                continue;
            }

            require_once App::$ROOT_PATH."/migrations/$migrations";

            
            $filename = pathinfo($migrations,PATHINFO_FILENAME);
            $instance  = new $filename(); 
            
            $this->log("Apliying migrations",$filename);
            $instance->up();
            $this->log("Apliead migrations",$filename);
            
            $saveMigrations[] = $migrations;

            if(!empty($saveMigrations))
            {
                $this->saveMigrations($saveMigrations);
            }else{
                $this->log("migrations aplied");
            }
        }
    }

    public function saveMigrations($migrations)
    {
        $params = implode(",",array_map(fn($mg) => "('$mg')",$migrations));

       // var_dump($params);exit;

        $statement = App::$app->db->pdo->prepare("
            INSERT INTO migrations (migration) 
            VALUES $params
        ");

        $statement->execute();
    }

    public function log($message,$migration)
    {
        echo $message ."\n [".date("d-m-Y H:i:s")."] _ ". $migration .PHP_EOL;
    }

    public function createTableMigrations()
    {
        App::$app->db->pdo->exec("
            CREATE TABLE IF NOT EXISTS migrations (
                id INT PRIMARY KEY AUTO_INCREMENT,
                migration VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )ENGINE=INNODB;
        ");
    }

    public function getTableMigrations()
    {
        $statement = App::$app->db->pdo->prepare("
            SELECT migration FROM migrations
        ");

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }
}