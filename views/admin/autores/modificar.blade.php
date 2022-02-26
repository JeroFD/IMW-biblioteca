@extends('plantillaadmin')
@section('contenido')
<form method="post" enctype="multipart/form-data">
    <h1>Modificar autor</h1>
    <p>
        <label class="w-100" for="nombre">Nombre
            <input class="form-control" id="nombre" type="text" name="nombre" value="{{$datos['nombre']}}"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="apellidos">Apellidos
            <input class="form-control" id="apellidos" type="text" name="apellidos" value="{{$datos['apellidos']}}"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="fecha_nacimiento">Fecha de nacimiento
            <input class="form-control" id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{$datos['fecha_nacimiento']}}"/>
        </label>
        <label class="w-100" for="fecha_fallecimiento">Fecha de fallecimiento
            <input class="form-control" id="fecha_fallecimiento" type="date" name="fecha_fallecimiento" value="{{$datos['fecha_fallecimiento']}}"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="lugar_nacimiento">Lugar de nacimiento
            <input class="form-control" id="lugar_nacimiento" type="text" name="lugar_nacimiento" value="{{$datos['lugar_nacimiento']}}"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="biografia">Biografía
        <textarea class="form-control" id="biografia" name="biografia" rows="4" cols="50">{{$datos['biografia']}}</textarea>
        </label>
    </p>
    <p>
        <label class="w-100" for="foto">Foto
            <input class="form-control" id="foto" type="file" name="foto"/>
        </label>
    </p>
    <p>
        <input type="hidden" name="id_autor" value="{{$datos['id_autor']}}">
        <input type="hidden" name="foto_anterior" value="{{$datos['foto']}}">

        <input type="submit" value="Modificar" class="btn btn-outline-success">
        <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
    </p>
</form>
@endsection