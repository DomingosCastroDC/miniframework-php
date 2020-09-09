<?php
namespace app\controllers;

use app\main\App;
use app\main\Controller;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public  $layout = "auth";
    
    public function login()
    {
        return $this->render("login");
    }

    public function registro()
    {
        $model = new RegisterModel();
        
        if(App::$app->request->isPost())
        {
            $model->load(App::$app->request->getBody());

            if($model->validate() && $model->register())
            {
                return "oi";
            }
        }

        var_dump($model->errors);
        
        return $this->render("registro");
    }
}