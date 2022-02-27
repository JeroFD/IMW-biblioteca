@extends('plantillaadmin')
@section('contenido')
<div>
    <h1>Préstamos</h1>
    @if (isset($_SESSION["mensajes"]))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $_SESSION["mensajes"] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @unset($_SESSION['mensajes'])
    @endif

    <table class="table table-striped table-bordered">
        <tr>
            <th>ID</th>
            <th>Libros</th>
            <th>Usuarios</th>
            <th>Fecha de préstamo</th>
            <th>Fecha de devolución</th>
            <th>Fecha restante</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($datos as $clave => $valor)
        <tr>
            <td>{{$valor['id']}}</td>
            <td>{{$valor['libro']}}</td>
            <td>{{$valor['nombre']}} {{$valor['apellidos']}}</td>
            <td>{{$valor['fecha_prestamo']}}</td>
            <td>{{$valor['fecha_devolucion']}}</td>
            <td>@if($valor['fecha_restante'] < 0)
                    Días de retraso: {{abs($valor['fecha_restante'])}}
                @else
                    Días restantes: {{$valor['fecha_restante']}}
                @endif

            </td>
            <td><a class="btn btn-outline-primary btn-sm" href="modificar.php?id={{$valor['id']}}"><i class="fa fa-pen"></i></a></td>
            <td><a class="btn btn-outline-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?id={{$valor['id']}}"><i class="fa fa-trash"></i></a></td>
        </tr>
        @endforeach
        <td class="text-center" colspan="9"><a class="btn btn-outline-success" href="nuevo.php"><i class="fa fa-plus" aria-hidden="true"></i> Crear nuevo registro</a></td>
    </table>
    <a href="../index.php" class="btn btn-outline-primary">Volver</a>
</div>

<script>
    function asegurar () {
        rc = confirm("¿Seguro que desea Eliminar?");
        return rc;
    }
</script>
@endsection