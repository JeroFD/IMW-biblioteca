@extends('plantillaadmin')
@section('contenido')
<h1>Añadir libro</h1>
<form action="" method="post">
    <p>
        <label for="titulo">Titulo</label>
        <input class="form-control" id="titulo" type="text" name="titulo">
    </p>
    <p>
        <label for="autor">Autor</label>
        <input class="form-control" id="autor" type="text" name="autor">
    </p>
    <p>
    <div>¿Disponible?</div>
    <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">No</label>
    </p>
    <p>
        <input class="btn btn-outline-success" type="submit" value="Guardar">
        <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
    </p>
</form>
@endsection