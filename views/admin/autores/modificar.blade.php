@extends('plantillaadmin')

@section('contenido')
<form method="post">
    <h1>Modificar autor</h1>
    <p>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" value="{{$autores['nombre']}}">
    </p>
    <p>
        <label for="apellidos">Apellidos</label>
        <input id="apellidos" type="text" name="apellidos" value="{{$autores['apellidos']}}">
    </p>
    <p>
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{$autores['fecha_nacimiento']}}">
        <label for="fecha_fallecimiento">Fecha de fallecimiento</label>
        <input id="fecha_fallecimiento" type="date" name="fecha_fallecimiento" value="{{$autores['fecha_fallecimiento']}}">
    </p>
    <p>
        <label for="lugar_nacimiento">Lugar de nacimiento</label>
        <input id="lugar_nacimiento" type="text" name="lugar_nacimiento" value="{{$autores['lugar_nacimiento']}}">
    </p>
    <p>
        <label for="biografia">Biografía</label>
        <textarea id="biografia" name="biografia" rows="4" cols="50">{{$autores['biografia']}}</textarea>
    </p>
    <p>
        <label for="foto">Foto</label>
        <input id="foto" type="text" name="foto" value="{{$autores['foto']}}">
    </p>
    <p>
        <input type="hidden" name="id_autor" value="{{$autores['id_autor']}}">
        <input type="submit" value="Modificar" class="btn btn-primary">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
    </p>
</form>
@endsection