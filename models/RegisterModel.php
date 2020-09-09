<?php
namespace app\models;

use app\main\Model;
use app\main\db\DbModel;
class RegisterModel extends DbModel
{
    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_DELECTED = 2;

    public string $firstname = '';
    public string $lastname =  '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public ?int $status = self::STATUS_INACTIVE;

    public function tableName():string
    {
        return "user";
    }

    public function primaryKey():string
    {
        return "id";
    }

    public function rules():array
    {
        return [
            "firstname"     => [self::RULE_REQUIRED],
            "lastname"      => [self::RULE_REQUIRED],
            "email"         => [self::RULE_REQUIRED,self::RULE_EMAIL],
            "password"      => [self::RULE_REQUIRED,[self::RULE_MIN,'min' => 3],[self::RULE_MAX,'max' => 10]],
            "passwordConfirm" => [self::RULE_REQUIRED,[self::RULE_MATCH,'match' => "password"]],

        ];
    }



    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);

        $saved = parent::save();

        if(!$saved)
        {
            return false;
        }

        return true;
    }

    public function attributes():array
    {
        return [
            'firstname',
            'lastname',
            'email',
            'password',
            'status'
        ];
    }

    public function getAttributeLabels()
    {
        return [
            'firstname'         => "First Name",
            'lastname'          => "Last Name",
            'email'             => "Your Email",
            'password'          => "Password",
            'passwordConfirm'   => "Confirm Password",
        ];
    }
}