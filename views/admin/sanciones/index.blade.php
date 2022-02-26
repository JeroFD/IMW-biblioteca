@extends('plantillaadmin')
@section('contenido')
<div>
    <h1>Sanciones</h1>
    <?php if(isset($_SESSION["mensajes"])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" aria-label="close">
        <?= $_SESSION["mensajes"] = "Registro añadido"; ?>
    </div>
    <?php
    unset($_SESSION["mensajes"]); }
    ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Fecha de inicio</th>
            <th>Fecha fin de sanción</th>
            <th>Motivo</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($datos as $clave => $valor)
        <tr>
            <td>{{$valor['id']}}</td>
            <td>{{$valor['nombre']}} {{$valor['apellidos']}}</td>
            <td>{{$valor['fecha_inicio']}}</td>
            <td>{{$valor['fecha_fin']}}</td>
            <td>{{$valor['motivo']}}</td>
            <td><a class="btn btn-outline-primary btn-sm" href="modificar.php?id={{$valor['id']}}"><i class="fa fa-pen"></i></a></td>
            <td><a class="btn btn-outline-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?id={{$valor['id']}}"><i class="fa fa-trash"></i></a></td>
        </tr>
        @endforeach
        <td class="text-center" colspan="8"><a class="btn btn-outline-success" href="nuevo.php"><i class="fa fa-plus" aria-hidden="true"></i> Crear nuevo registro</a></td>
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