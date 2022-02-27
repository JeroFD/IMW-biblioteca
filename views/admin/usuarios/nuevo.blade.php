@extends('plantillaadmin')
@section('contenido')
<h1>Añadir usuario</h1>
<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label class="w-100" for="avatar">Avatar
            <input class="form-control" id="avatar" type="file" name="avatar"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="nombre">Nombre
            <input class="form-control" id="nombre" type="text" name="nombre"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="apellidos">Apellidos
            <input class="form-control" id="apellidos" type="text" name="apellidos"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="email">Email
            <input class="form-control" id="email" type="text" name="email"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="password">Contraseña
            <input class="form-control" id="password" type="password" name="password"/>
        </label>
    </p>
    <p>
        <label class="w-100" for="tipo">Tipo
            <select name="tipo" id="tipo" class="form-control">
                <option value="">Seleccione tipo</option>
                <option value="Bibliotecario">Bibliotecario</option>
                <option value="Alumnado">Alumnado</option>
                <option value="Profesorado">Profesorado</option>
            </select>
        </label>
    </p>
    <div>¿Activo?</div>
    <input id="si-activo" type="radio" name="activo" value="1" checked> <label for="si-activo">Si</label>
    <input id="no-activo" type="radio" name="activo" value="0"> <label for="no-activo">No</label>

    <p>
        <input class="btn btn-outline-success" type="submit" value="Guardar">
        <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
    </p>
</form>
@endsection