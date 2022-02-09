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
    <div class="d-flex justify-content-between mb-2">
        <form action="index.php" method="post">
            <div class="input-group">
                <input class="form-control" type="text" name="buscar">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>
        <a class="btn btn-success btn-sm" href="nuevo.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Crear</a>
    </div>
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
        <?php foreach ($datos as $clave => $valor): ?>
        <tr>
            <td><?= $valor['id_autor']; ?></td>
            <td><?= $valor['nombre']; ?></td>
            <td><?= $valor['apellidos']; ?></td>
            <td><?= $valor['fecha_nacimiento']; ?></td>
            <td><?= $valor['fecha_fallecimiento']; ?></td>
            <td><?= $valor['lugar_nacimiento']; ?></td>
            <td><?= $valor['biografia']; ?></td>
            <td><img src="<?= $valor['foto']; ?>"></td>
            <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
            <td><a class="btn btn-primary btn-sm" href="modificar.php?id_autor=<?= $valor['id_autor'] ?>"><i class="fas fa-pen"></i></a></td>
            <td><a class="btn btn-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?id_autor=<?= $valor['id_autor'] ?>"><i class="fas fa-trash"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="../index.php" class="btn btn-primary">Volver</a>
</div>
<script>
    function asegurar () {
        rc = confirm("¿Seguro que desea eliminar?");
        return rc;
    }
</script>
@endsection