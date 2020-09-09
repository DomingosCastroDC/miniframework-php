<?php
namespace app\controllers;

use app\main\App;
use app\main\Controller;

class SiteController extends Controller
{
    public function home()
    {

        return App::$app->view->render("home",[
            "nome" => "Domingos Castro"
        ]);
    }

    public function contacto()
    {
        return App::$app->view->render("contacto");
    }
}