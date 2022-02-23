@extends('plantillaadmin')
@section('contenido')
<body>
<h1>Modificar usuario</h1>
<form method="post">
    <p>
        <label for="nombre">Nombre</label>
        <input class="form-control" id="nombre" type="text" name="nombre" value="{{$datos['nombre']}}">
    </p>
    <p>
        <label for="apellidos">Apellidos</label>
        <input class="form-control" id="apellidos" type="text" name="apellidos" value="{{$datos['apellidos']}}">
    </p>
    <p>
        <label for="email">Email</label>
        <input class="form-control" id="email" type="text" name="email" value="{{$datos['email']}}">
    </p>
    <p>
        <label for="password">Contraseña</label>
        <input class="form-control" id="password" type="password" name="password" value="{{$datos['password']}}">
    </p>
    <p>
    <p>
        <label for="tipo">Tipo</label>
        <select name="tipo" class="form-control">
            <option value="">Selecciona tipo</option>
            <option value="Bibliotecario">Bibliotecario</option>
            <option value="Alumnado">Alumnado</option>
            <option value="Profesorado">Profesorado</option>
        </select>
    </p>
    <div>¿Activo?</div>
    <input id="si-activo" type="radio" name="activo" value="1" checked> <label for="si-activo">Si</label>
    <input id="no-activo" type="radio" name="activo" value="0"> <label for="no-activo">No</label>
    <p>
        <input type="hidden" name="codigo" value="{{$datos['id']}}">
        <input class="btn btn-outline-primary" type="submit" value="Modificar">
        <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
    </p>
</form>
@endsection