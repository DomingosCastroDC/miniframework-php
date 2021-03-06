<?php
namespace app\main;

class Controller
{
    public $layout = "main";

    public function render($view,$params = [])
    {
        return App::$app->view->render($view,$params);
    }   

    public function redirect($url)
    {
        return App::$app->response->redirect($url);
    }
}