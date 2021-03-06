@extends('plantillaadmin')
@section('contenido')
<h1>Modificar usuario</h1>
<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label class="w-100" for="avatar">Avatar
            <input class="form-control" id="avatar" type="file" name="avatar"/>
        </label>
    </p>
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
        <label class="w-100" for="email">Email
            <input class="form-control" id="email" type="text" name="email" value="{{$datos['email']}}"/>
        </label>
    </p>

    <p>
    <p>
        <label class="w-100" for="tipo">Tipo
            <select name="tipo" id="tipo" class="form-control">
                <option value="Bibliotecario" {{$datos['tipo']=="Bibliotecario"?'selected':''}}>Bibliotecario</option>
                <option value="Alumnado" {{$datos['tipo']=="Alumnado"?'selected':''}}>Alumnado</option>
                <option value="Profesorado" {{$datos['tipo']=="Profesorado"?'selected':''}}>Profesorado</option>
            </select>
        </label>
    </p>
    <div>¿Activo?</div>
    <input id="si-activo" type="radio" name="activo" value="1" checked> <label for="si-activo">Si</label>
    <input id="no-activo" type="radio" name="activo" value="0"> <label for="no-activo">No</label>

    <p>
        <label class="w-100" for="password">Contraseña
            <input class="form-control" id="password" type="password" name="password" value="{{$datos['password']}}"/>
        </label>
    </p>
    <p>
        <input type="hidden" name="codigo" value="{{$datos['id']}}">
        <input type="hidden" name="avatar_anterior" value="{{$datos['avatar']}}"/>

        <input class="btn btn-outline-primary" type="submit" value="Modificar">
        <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
    </p>
</form>
@endsection