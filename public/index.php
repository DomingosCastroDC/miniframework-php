<?php

use app\main\App;
use app\controllers\siteController;
use app\controllers\AuthController;


require_once __DIR__."/../vendor/autoload.php";
require_once dirname(__DIR__)."/helpers/Routes.php";

$app = new App(dirname(__DIR__));
$app->router->get("/",[siteController::class,"home"]);

$app->router->get("/contacto",[siteController::class,"contacto"]);


$app->router->get("/login",[AuthController::class,"login"]);
$app->router->get("/registro",[AuthController::class,"registro"]);
$app->router->post("/registro",[AuthController::class,"registro"]);



$app->execute();