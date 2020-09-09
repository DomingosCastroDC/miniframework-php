<?php

use app\main\App;


require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/helpers/main.php";

$app = new App(__DIR__,$config);

$app->migration->applyingMigrations();
