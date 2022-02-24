@extends('plantilla')
@section('contenido')

<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
            <h1 class="mx-auto w-25" >Iniciar sesión</h1>
            <?php
            if(isset($errors) && count($errors) > 0) {
                foreach($errors as $error_msg) {
                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                }
            }
            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Introduce un correo electrónico" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Contraseña:</label>
                    <input type="password" name="password" placeholder="Introduce una contraseña" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-outline-primary mt-2">Enviar</button>
                <a href="register.php" class="btn btn-outline-secondary mt-2">Regístrate</a>
            </form>
        </div>
    </div>
</div>
@section('piedepagina')
    <p>© 2022 - Jerónimo Omar Falcón Dávila</p>
@endsection
@endsection