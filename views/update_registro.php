
<?php


$this->title = "editar registro";

?>
<h1> Actualizar Registro </h1>

<?= $this->renderView("_form_register",[
    'model' => $model
]) ?>

