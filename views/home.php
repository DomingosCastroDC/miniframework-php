<?php

$this->title = "home";

use app\models\RegisterModel;

$user = RegisterModel::findOne(['id' => 3]);

var_dump($user);
?>
<h1 class="text-center text-danger">Seja Benvindo <?= $nome ?></h1>