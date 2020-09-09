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

    public function view($id)
    {
        $model = RegisterModel::findOne(['id' => $id]);

        return $this->render("view_registro",[
            'model' => $model
        ]);
    }

    public function registro()
    {
        $model = new RegisterModel();
        
        if(App::$app->request->isPost())
        {
            $model->load(App::$app->request->getBody());

            if($model->validate() && $model->save())
            {
                return $this->redirect("/");
            }
        }
        
        return $this->render("create_registro",[
            'model' => $model
        ]);
    }

    public function update($id)
    {
        $model = RegisterModel::findOne(['id' => $id]);
        
        if(App::$app->request->isPost())
        {
            $model->load(App::$app->request->getBody());

            if($model->validate() && $model->save())
            {
                return $this->redirect("/");
            }
        }
        
        return $this->render("update_registro",[
            'model' => $model
        ]);
    }
}