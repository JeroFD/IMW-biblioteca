@extends('plantillaadmin')
@section('contenido')
<body>
<h1>Modificar libro</h1>
<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label for="titulo">Titulo
            <input class="form-control" id="titulo" type="text" name="titulo" value="{{$datos['titulo']}}">
        </label>
    </p>
    <p>
        <label class="w-100" for="portada">Portada
            <input class="form-control" id="portada" type="file" name="portada" value="{{$datos['portada']}}">
        </label>
    </p>
    <p>
        <label class="w-100" for="id_autor">Autores
            <select name="id_autor" id="id_autor" class="form-control">
                @foreach($autores as $autor)
                    <option value="{{$autor['id_autor']}}" {{$datos['id_autor']==$autor['id_autor']?'selected':''}}>{{$autor['nombre']}} {{$autor['apellidos']}}</option>
                @endforeach
            </select>
        </label>
    </p>
    <p>
        <label class="w-100" for="id_categoria">Categorias
            <select name="id_categoria" id="id_categoria" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria['id_categoria']}}" {{$datos['id_categoria']==$categoria['id_categoria']?'selected':''}}>{{$categoria['nombre']}}</option>
                @endforeach
            </select>
        </label>
    </p>
    <p>
        <label class="w-100" for="id_editorial">Editorial
            <select name="id_editorial" id="id_editorial" class="form-control">
                @foreach($editoriales as $editorial)
                    <option value="{{$editorial['id_editorial']}}" {{$datos['id_editorial']==$editorial['id_editorial']?'selected':''}}>{{$editorial['nombre']}}</option>
                @endforeach
            </select>
        </label>
    </p>
    <p>
    <div>¿Disponible?</div>
    <input id="si-disponible" type="radio" name="disponible" value="1" {{$datos['disponible'] ? ' checked' : ''}}> <label for="si-disponible">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"{{$datos['disponible'] ? ' checked' : ''}}> <label for="no-disponible">No</label>
    <p>
        <input type="hidden" name="codigo" value="{{$datos['codigo']}}">
        <input type="hidden" name="portada_antigua" value="{{$datos['portada']}}">

        <input class="btn btn-outline-primary" type="submit" value="Modificar">
        <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
    </p>
</form>
@endsection