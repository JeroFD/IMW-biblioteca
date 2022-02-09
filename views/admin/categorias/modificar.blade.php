@extends('plantillaadmin')
@section('contenido')
<h1>Modificar categoría</h1>

<form method="post">
    <p>
        <label for="nombre">Categoria</label>
        <input class="form-control" id="nombre" type="text" name="nombre" value="{{$categoria['nombre']}}">
    </p>
    <input type="hidden" name="id_categoria" value="{{$categoria['id_categoria']}}">

    <input type="submit" value="Modificar" class="btn btn-outline-success">
    <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
</form>
@endsection