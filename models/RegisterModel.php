<?php
namespace app\models;

use app\main\Model;
class RegisterModel extends Model
{
    public string $firstname = '';
    public string $lastname =  '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function rules():array
    {
        return [
            "firstname" => [self::RULE_REQUIRED],
            "lastname" => [self::RULE_REQUIRED],
            "email" => [self::RULE_REQUIRED,self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED,[self::RULE_MIN,'min' => 3],[self::RULE_MAX,'max' => 10]],
            "passwordConfirm" => [self::RULE_REQUIRED,[self::RULE_MATCH,'match' => "password"]],

        ];
    }

    public function register()
    {
        return "olá";
    }
}