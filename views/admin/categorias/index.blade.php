@extends('plantillaadmin')
@section('contenido')
<h1>Categorías</h1>
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
        <th colspan="2">Opciones</th>
    </tr>
    @foreach ($datos as $clave => $valor)
    <tr>
        <td>{{$valor['id_categoria']}}</td>
        <td>{{$valor['nombre']}}</td>
        <td><a class="btn btn-outline-primary btn-sm" href="modificar.php?id_categoria={{$valor['id_categoria']}}">
                <i class="fa fa-pen" aria-hidden="true"></i>
            </a>
        </td>
        <td>
            <a class="btn btn-outline-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?id_categoria={{$valor['id_categoria']}}">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
    @endforeach
    <td class="text-center" colspan="4"><a class="btn btn-outline-success" href="nuevo.php"><i class="fa fa-plus" aria-hidden="true"></i> Crear nuevo registro</a></td>
</table>
<a href="../index.php" class="btn btn-outline-primary">Volver</a>

<script>
    function asegurar () {
        rc = confirm("¿Seguro que desea Eliminar?");
        return rc;
    }
</script>
@endsection
