@extends('plantillaadmin')
@section('contenido')
<h1>Añadir categoría</h1>

<form action="" method="post">
    <p>
        <label for="nombre">Nombre</label>
        <input class="form-control" id="nombre" type="text" name="nombre">
    </p>
    <p>
        <input class="btn btn-outline-success" type="submit" value="Guardar">
        <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
    </p>
</form>
@endsection