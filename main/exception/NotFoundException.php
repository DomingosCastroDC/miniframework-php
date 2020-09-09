<?php
namespace app\main\exception;

class NotFoundException extends \Exception
{
    public function __construct($message)
    {
        $this->message = $message;
        $this->code = 404;
    }

}