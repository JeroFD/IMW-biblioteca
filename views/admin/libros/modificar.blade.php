@extends('plantillaadmin')
@section('contenido')
<body>
<h1>Modificar libro</h1>
<form method="post">
    <p>
        <label for="titulo">Titulo</label>
        <input class="form-control" id="titulo" type="text" name="titulo" value="{{$libros['titulo']}}">
    </p>
    <p>
        <label for="autor">Autor</label>
        <input class="form-control" id="autor" type="text" name="autor" value="{{$libros['autor']}}">
    </p>
    <p>
    <div>¿Disponible?</div>
    <input id="si-disponible" type="radio" name="disponible" value="1" {{$libros['disponible'] ? ' checked' : ''}}> <label for="si-disponible">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"{{!$libros['disponible'] ? ' checked' : ''}}> <label for="no-disponible">No</label>
    </p>
    <p>
        <input type="hidden" name="codigo" value="{{$libros['codigo']}}">
        <input class="btn btn-outline-primary" type="submit" value="Modificar">
        <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
    </p>
</form>
@endsection