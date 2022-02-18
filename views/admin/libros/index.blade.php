@extends('plantillaadmin')
@section('contenido')
<div>
    <h1>Libros</h1>
    <?php if(isset($_SESSION["mensajes"])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" aria-label="close">
        <?= $_SESSION["mensajes"] = "Registro añadido"; ?>
    </div>
    <?php
    unset($_SESSION["mensajes"]); }
    ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>¿Disponible?</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($datos as $clave => $valor)
        <tr>
            <td>{{$valor['codigo']}}</td>
            <td>{{$valor['titulo']}}</td>
            <td>{{$valor['autor']}}</td>
            <td>{{$valor['disponible'] ? 'Si' : 'No'}}</td>
            <td><a class="btn btn-outline-primary btn-sm" href="modificar.php?codigo={{$valor['codigo']}}>"><i class="fas fa-pen"></i></a></td>
            <td><a class="btn btn-outline-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?codigo={{$valor['codigo']}}"><i class="fas fa-trash"></i></a></td>
        </tr>
        @endforeach
        <td class="text-center" colspan="6"><a class="btn btn-outline-success" href="nuevo.php"><i class="fa fa-plus" aria-hidden="true"></i> Crear nuevo registro</a></td>
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