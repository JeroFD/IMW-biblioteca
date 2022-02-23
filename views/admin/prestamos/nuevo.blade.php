@extends('plantillaadmin')
@section('contenido')
<h1>Añadir préstamo</h1>
<form action="" method="post">
    <label class="w-100" for="libro_id">Libros
        <select name="libro_id" id="libro_id" class="form-control">
            <option value="">Seleccione libro</option>
            @foreach($libros as $libro)
                <option value='{{$libro['codigo']}}'>{{$libro['titulo']}}</option>
            @endforeach
        </select>
    </label>
    <label class="w-100" for="usuario_id">Usuario
        <select name="usuario_id" id="usuario_id" class="form-control">
            <option value="">Seleccione usuario</option>
            @foreach($usuarios as $usuario)
                <option value="{{$usuario['id']}}">{{$usuario['nombre']}} {{$usuario['apellidos']}}</option>
            @endforeach
        </select>
    </label>
    <p>
        <label for="fecha_prestamo">Fecha prestamo</label>
        <input class="form-control" id="fecha_prestamo" type="date" name="fecha_prestamo">
    </p>
    <p>
        <label for="fecha_devolucion">Fecha devolucion</label>
        <input class="form-control" id="fecha_devolucion" type="date" name="fecha_devolucion">
    </p>
    <p>
        <input class="btn btn-outline-success" type="submit" value="Guardar">
        <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
    </p>
</form>
@endsection