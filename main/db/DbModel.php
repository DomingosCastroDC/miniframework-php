<?php
namespace app\main\db;

use app\main\Model;
use app\main\App;
abstract class DbModel extends Model
{

    abstract public function tableName():string;
    abstract public function attributes():array;
    abstract public function primaryKey():string;


    public function save()
    {
        $this->insert();

        $this->update();
    }

    private function insert()
    {
        $tablename = $this->tableName();
        $attributes = $this->attributes();

        $attribute = implode(",",$attributes);
        $params = implode(",",array_map(fn($attr) => ":$attr",$attributes));

        $statement = App::$app->db::prepare("
            INSERT INTO $tablename (".$attribute.")
            VALUES ($params)
        ");

        foreach($attributes as $attribute)
        {
            $statement->bindValue(":$attribute",$this->{$attribute});
        }

        $statement->execute();

        return $statement->rowCount();
    }

    

    public static function findOne(array $where)
    {
        $tablename = static::tableName();
        $attribute = array_keys($where);

        $sql = implode(" AND ",array_map(fn($attr) => "$attr = :$attr",$attribute));

        $statement = App::$app->db::prepare("
            SELECT * FROM $tablename 
            WHERE $sql 
        ");

        foreach ($where as $key => $value) {
            $statement->bindValue(":$key",$value);
        }

        $statement->execute();

        return $statement->fetchObject(static::class);
    }


}