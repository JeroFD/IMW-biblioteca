@extends('plantillaadmin')
@section('contenido')
<h1>Modificar editorial</h1>

<form method="post">
    <p>
        <label for="nombre">Editorial</label>
        <input class="form-control" id="nombre" type="text" name="nombre" value="{{$editorial['nombre']}}">
    </p>
    <input type="hidden" name="id_editorial" value="{{$editorial['id_editorial']}}">
    <input type="submit" value="Modificar" class="btn btn-outline-success">
    <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
    </p>
</form>
@endsection