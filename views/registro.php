
<?php

use app\main\forms\Form;
$this->title = "Registro";

?>
<h1> Estou no registro </h1>

<?php $form = Form::begin("","post") ?>

    <?= $form->field($model,"firstname")  ?>
    <?= $form->field($model,"lastname")  ?>
    <?= $form->field($model,"email")  ?>
    <?= $form->field($model,"password")  ?>
    <?= $form->field($model,"passwordConfirm")  ?>

    <div class="form-group">
        <input id="my-input" class="btn btn-primary" type="submit" value="Enviar" name="">
    </div>
    
<?php Form::end() ?>