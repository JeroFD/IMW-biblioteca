@extends('plantillaadmin')
@section('contenido')
<div class="container-sm">
    <h1>Autores</h1>
    <?php if(isset($_SESSION["mensajes"])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" aria-label="close">
        <?= $_SESSION["mensajes"] = "Registro añadido"; ?>
    </div>
    <?php
    unset($_SESSION["mensajes"]);
    }
    ?>
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
                <td>{{$valor['fecha_fallecimiento']}}</td>
                <td>{{$valor['lugar_nacimiento']}}</td>
                <td>{{$valor['biografia']}}</td>
                <td><img src="{{$valor['foto']}}"></td>
                <td><a class="btn btn-outline-primary btn-sm" href="modificar.php?id_autor={{$valor['id_autor']}}"><i class="fas fa-pen"></i></a></td>
                <td><a class="btn btn-outline-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?id_autor={{ $valor['id_autor']}}"><i class="fas fa-trash"></i></a></td>
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