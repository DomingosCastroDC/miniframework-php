<?php
namespace app\main;

abstract class Model
{
    public const RULE_REQUIRED  = 'required';
    public const RULE_EMAIL     = 'email';
    public const RULE_MIN       = 'min';
    public const RULE_MAX       = 'max';
    public const RULE_STRING    = 'string';
    public const RULE_MATCH     = 'match';

    public array $errors = [];

    public function load(array $data)
    {
        foreach ($data as $key => $value) {
            if(property_exists($this,$key))
            {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules():array;

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach($rules as $rule)
            {
                $rulename = $rule;

                if(!is_string($rulename))
                {
                    $rulename = $rule[0];
                }

                if($rulename === self::RULE_REQUIRED && !$value)
                {
                    $this->addError($attribute,self::RULE_REQUIRED);
                }

                if($rulename === self::RULE_EMAIL && !filter_var($value,FILTER_VALIDATE_EMAIL))
                {
                    $this->addError($attribute,self::RULE_EMAIL);
                }

                if($rulename === self::RULE_MIN && strlen($value) < $rule['min'])
                {
                    $this->addError($attribute,self::RULE_MIN,$rule);
                }

                if($rulename === self::RULE_MAX && strlen($value) > $rule['max'])
                {
                    $this->addError($attribute,self::RULE_MAX,$rule);
                }

                if($rulename === self::RULE_MATCH && $value !== $this->{$rule['match']})
                {
                    $this->addError($attribute,self::RULE_MATCH,$rule);
                }
            }
        }

        return empty($this->errors);
    }

    public function errorMessage()
    {
        return [
            self::RULE_REQUIRED => "Este campo é requerido",
            self::RULE_EMAIL => "Este campo deve ser um endereço de email válido",
            self::RULE_MIN => "Este campo deve ser maior que {min}",
            self::RULE_MAX => "Este campo deve ser menor que {max}",
            self::RULE_MATCH => "Este campo deve ser igual ao campo {match}",

        ];
    }

    public function addError($attribute,$rule,$params = [])
    {   
        $message = $this->errorMessage()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}",$value,$message);
        }

        $this->errors[$attribute][] = $message;
    }
}