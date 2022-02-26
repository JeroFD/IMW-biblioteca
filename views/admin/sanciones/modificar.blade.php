@extends('plantillaadmin')
@section('contenido')
    <h1>Modificar sanción</h1>
    <form action="" method="post">
        <label class="w-100" for="id_usuario">Usuario
            <select name="id_usuario" id="id_usuario" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{$usuario['id']}}" {{$datos['id_usuario']==$usuario['id']?'selected':''}}>{{$usuario['nombre']}} {{$usuario['apellidos']}}</option>
                @endforeach
            </select>
        </label>
        <p>
            <label class="w-100" for="fecha_inicio">Fecha de inicio
                <input class="form-control" id="fecha_inicio" type="date" name="fecha_inicio" value="{{$datos['fecha_inicio']}}"/>
            </label>
        </p>
        <p>
            <label class="w-100" for="fecha_fin">Fecha fin de sanción
                <input class="form-control" id="fecha_fin" type="date" name="fecha_fin" value="{{$datos['fecha_fin']}}"/>
            </label>
        </p>
        <p>
            <label class="w-100" for="motivo">Motivo
                <textarea class="form-control" id="motivo" name="motivo" rows="4">{{$datos['motivo']}}</textarea>
            </label>
        </p>
        <p>
            <input type="hidden" name="codigo" value="{{$datos['id_usuario']}}">

            <input class="btn btn-outline-success" type="submit" value="Guardar">
            <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
        </p>
    </form>
@endsection