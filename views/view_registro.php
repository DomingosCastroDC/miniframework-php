
<?php


$this->title = "Ver Registro";

?>
<h1> Visualizando Registro </h1>

<a href="/update?id=<?= $model->id ?>" class="btn btn-success"> Editar Registro </a>

<p> <?= $model->firstname ?> </p>

