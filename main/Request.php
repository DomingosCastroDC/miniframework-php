<?php
namespace app\main;

class Request
{
    public function getUriPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? "/";

        $strpos = strpos($path,"?") ?? false;

        if($strpos === false)
        {
            return $path;
        }

        return substr($path,0,$strpos);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost()
    {
        return $this->getMethod() === "post";
    }

    public function isGet()
    {
        return $this->getMethod() === "get";
    }

    public function getBody()
    {
        $body = [];

        if($this->isGet())
        {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->isPost())
        {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}