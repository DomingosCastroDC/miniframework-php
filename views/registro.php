
<?php

$this->title = "Registro";

?>
<h1> Estou no registro </h1>
<form method="post" action="">
    <div class="row">
    
        <div class="col">
            <div class="form-group">
                <label for="">Firstname</label>
                <input type="text" name="firstname" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        </div>    
        <div class="col">
            <div class="form-group">
                <label for="">Lastname</label>
                <input type="text" name="lastname" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        </div>  

        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="">PasswordConfirm</label>
                <input type="text" name="passwordConfirm" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
            <input id="my-input" class="btn btn-primary" type="submit" value="Enviar" name="">
        </div>
    
    </div>
</form>  