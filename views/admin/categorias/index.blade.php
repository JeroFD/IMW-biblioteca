@extends('plantillaadmin')
@section('contenido')
<h1>Categorías</h1>
<div class="d-flex justify-content-between mb-2">
    <form action="index.php" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="buscar">
            <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </form>

    <a class="btn btn-outline-success" href="nuevo.php"><i class="fa fa-plus" aria-hidden="true"></i></a>

</div>

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
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
        </td>
        <td>
            <a class="btn btn-outline-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?id_categoria={{$valor['id_categoria']}}">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
    @endforeach
</table>
<a href="../index.php" class="btn btn-outline-primary">Volver</a>

<script>
    function asegurar () {
        rc = confirm("¿Seguro que desea Eliminar?");
        return rc;
    }
</script>
@endsection
