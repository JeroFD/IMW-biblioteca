@extends('plantillaadmin')
@section('contenido')
<h1>Añadir usuario</h1>
<form action="" method="post">
    <p>
        <label for="nombre">Nombre</label>
        <input class="form-control" id="nombre" type="text" name="nombre">
    </p>
    <p>
        <label for="apellidos">Apellidos</label>
        <input class="form-control" id="apellidos" type="text" name="apellidos">
    </p>
    <p>
        <label for="email">Email</label>
        <input class="form-control" id="email" type="text" name="email">
    </p>
    <p>
        <label for="password">Password</label>
        <input class="form-control" id="password" type="password" name="password">
    </p>
    <p>
        <label for="tipo">Tipo</label>
        <input class="form-control" id="password" type="text" name="tipo">
    </p>
    <p>
    <div>¿Activo?</div>
    <input id="si-activo" type="radio" name="activo" value="1" checked> <label for="si-activo">Si</label>
    <input id="no-activo" type="radio" name="activo" value="0"> <label for="no-activo">No</label>
    </p>
    <p>
        <input class="btn btn-outline-success" type="submit" value="Guardar">
        <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
    </p>
</form>
@endsection