
<?php


$this->title = "Criando Registro";

?>
<h1> Criando Registro </h1>

<?= $this->renderView("_form_register",[
    'model' => $model
]) ?>

