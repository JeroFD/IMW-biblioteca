@extends('plantillaadmin')
@section('contenido')
<h1>Añadir libro</h1>
<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label class="w-100" for="titulo">Titulo
            <input class="form-control" id="titulo" type="text" name="titulo">
        </label>
    </p>
    <p>
        <label class="w-100" for="portada">Portada
            <input class="form-control" id="portada" type="file" name="portada">
        </label>
    </p>
    <p>
        <label class="w-100" for="id_autor">Autores
            <select name="id_autor" id="id_autor" class="form-control">
                <option value="">Seleccione autor</option>
                @foreach($autores as $autor)
                    <option value='{{$autor['id_autor']}}'>{{$autor['nombre']}} {{$autor['apellidos']}}</option>
                @endforeach
            </select>
        </label>
    </p>
    <p>
        <label class="w-100" for="id_categoria">Categorias
            <select name="id_categoria" id="id_categoria" class="form-control">
                <option value="">Seleccione categoria</option>
                @foreach($categorias as $categoria)
                    <option value='{{$categoria["id_categoria"]}}'>{{$categoria['nombre']}}</option>
                @endforeach
            </select>
        </label>
    </p>
    <label class="w-100" for="id_editorial"> Editorial
        <select name="id_editorial" id="id_editorial" class="form-control">
            <option value="">Seleccione editorial</option>
            @foreach($editoriales as $editorial)
                <option value='{{$editorial["id_editorial"]}}'>{{$editorial['nombre']}}</option>
            @endforeach
        </select>
    </label>
    <p>
    <div>¿Disponible?</div>
    <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">No</label>
    <p>
        <input class="btn btn-outline-success" type="submit" value="Guardar">
        <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
    </p>
</form>
@endsection