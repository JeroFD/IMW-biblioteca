@extends('plantillaadmin')
@section('contenido')
    <h1>Autores</h1>
    @if (isset($_SESSION["mensajes"]))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $_SESSION["mensajes"] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @unset($_SESSION['mensajes'])
    @endif

    <table class="table table-striped table-bordered">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de nacimiento</th>
            <th>Fecha de fallecimiento</th>
            <th>Lugar de nacimiento</th>
            <th>Biografia</th>
            <th>Foto</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($datos as $clave => $valor)
            <tr>
                <td>{{$valor['id_autor']}}</td>
                <td>{{$valor['nombre']}}</td>
                <td>{{$valor['apellidos']}}</td>
                <td>{{$valor['fecha_nacimiento']}}</td>
                <td>{{($valor['fecha_fallecimiento'] == "0000-00-00") ? "Autor no fallecido" : $valor['fecha_fallecimiento']}}</td>
                <td>{{$valor['lugar_nacimiento']}}</td>
                <td>{{substr($valor['biografia'], 0, 170)}}...</td>
                <td class="text-center"><img src="../../imagenes/autores/{{$valor['foto']}}"></td>
                <td><a class="btn btn-outline-primary btn-sm" href="modificar.php?id_autor={{$valor['id_autor']}}"><i class="fa fa-pen"></i></a></td>
                <td><a class="btn btn-outline-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?id_autor={{ $valor['id_autor']}}"><i class="fa fa-trash"></i></a></td>
            </tr>
        @endforeach
        <td class="text-center" colspan="10"><a class="btn btn-outline-success" href="nuevo.php"><i class="fa fa-plus" aria-hidden="true"></i> Crear nuevo registro</a></td>
    </table>
    <a href="../index.php" class="btn btn-outline-primary">Volver</a>
</div>
<script>
    function asegurar () {
        rc = confirm("¿Seguro que desea eliminar?");
        return rc;
    }
</script>
@endsection