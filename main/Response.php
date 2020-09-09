<?php

namespace app\main;

class Response
{
    public function redirect($url)
    {
        header("location:".$url);
    }
}