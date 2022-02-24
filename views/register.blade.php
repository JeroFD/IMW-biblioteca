@extends('plantilla')
@section('contenido')
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
            <h1 class="mx-auto w-25" >Registro</h1>
            <?php
            if(isset($errors) && count($errors) > 0) {
                foreach($errors as $error_msg) 	{
                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                }
            }
            if(isset($success)) {
                echo '<div class="alert alert-success">'.$success.'</div>';
            }
            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                    <label for="email">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Introduce un nombre" class="form-control" value="<?php echo ($valFirstName??'')?>">
                </div>
                <div class="form-group">
                    <label for="email">Apellidos:</label>
                    <input type="text" name="apellidos" placeholder="Introduce un apellido" class="form-control" value="<?php echo ($valLastName??'')?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Introduce un correo electrónico" class="form-control" value="<?php echo ($valEmail??'')?>">
                </div>

                <div class="form-group ">
                    <label for="email">Contraseña:</label>
                    <input type="password" name="password" placeholder="Introduzca una contraseña" class="form-control" value="<?php echo ($valPassword??'')?>">
                </div>

                <button type="submit" name="submit" class="btn btn-outline-primary mt-2">Enviar</button>
                <p class="pt-2"> Volver a <a href="login.php">Iniciar sesión</a></p>
            </form>
        </div>
    </div>
</div>
@endsection