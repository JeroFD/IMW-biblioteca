@extends('plantillaadmin')
@section('contenido')
<form action="" method="post">
    <form method="post">
        <h1>Añadir autor</h1>
        <p>
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre">
        </p>
        <p>
            <label for="apellidos">Apellidos</label>
            <input id="apellidos" type="text" name="apellidos"/>
        </p>
        <p>
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input id="fecha_nacimiento" type="date" name="fecha_nacimiento"/>
            <label for="fecha_fallecimiento">Fecha de fallecimiento</label>
            <input id="fecha_fallecimiento" type="date" name="fecha_fallecimiento"/>
        </p>
        <p>
            <label for="lugar_nacimiento">Lugar de nacimiento</label>
            <input id="lugar_nacimiento" type="text" name="lugar_nacimiento"/>
        </p>
        <p>
            <label for="biografia">Biografía</label>
            <textarea id="biografia" name="biografia" rows="4" cols="50"></textarea>
        </p>
        <p>
            <label for="foto">Foto</label>
            <input id="foto" type="text" name="foto"/>
        </p>
        <p>
            <input type="hidden" name="id_autor" value="<?= $id_autor ?>">
            <input type="submit" value="Añadir" class="btn btn-success">
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </p>
    </form>
</form>
@endsection