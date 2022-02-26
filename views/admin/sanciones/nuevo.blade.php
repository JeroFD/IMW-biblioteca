@extends('plantillaadmin')
@section('contenido')
<h1>Añadir sanción</h1>
<form action="" method="post">
    <label class="w-100" for="id_usuario">Usuarios
        <select name="id_usuario" id="id_usuario" class="form-control">
            <option value="">Seleccione usuario</option>
            @foreach($usuarios as $usuario)
                <option value='{{$usuario['id']}}'>{{$usuario['nombre']}} {{$usuario['apellidos']}}</option>
            @endforeach
        </select>
    </label>
    <p>
        <label class="w-100" for="fecha_inicio">Fecha inicio
            <input class="form-control" id="fecha_inicio" type="date" name="fecha_inicio">
        </label>
    </p>
    <p>
        <label class="w-100" for="fecha_fin">Fecha fin
            <input class="form-control" id="fecha_fin" type="date" name="fecha_fin">
        </label>
    </p>
    <p>
        <label class="w-100" for="motivo">Motivo
            <textarea class="form-control" id="motivo" name="motivo" rows="4"></textarea>
        </label>
    </p>
    <p>
        <input class="btn btn-outline-success" type="submit" value="Guardar">
        <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
    </p>
</form>
@endsection