@extends('plantillaadmin')
@section('contenido')
<body>
<h1>Modificar libro</h1>
<form method="post">
    <p>
        <label for="titulo">Titulo</label>
        <input class="form-control" id="titulo" type="text" name="titulo" value="{{$datos['titulo']}}">
    </p>
    <p>
        <label class="w-100" for="id_autor">Autores
            <select name="id_autor" id="id_autor" class="form-control">
                <option value="">Selecciona un autor</option>
                @foreach($autores as $autor)
                    <option value="{{$autor['id_autor']}}">{{$autor['nombre']}} {{$autor['apellidos']}}</option>
                @endforeach
            </select>
        </label>
    </p>
    <p>
        <label class="w-100" for="id_categoria">Categorias
            <select name="id_categoria" id="id_categoria" class="form-control">
                <option value="">Selecciona categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria['id_categoria']}}">{{$categoria['nombre']}}</option>
                @endforeach
            </select>
        </label>
    </p>
    <p>
        <label class="w-100" for="id_editorial">Editorial
            <select name="id_editorial" id="id_editorial" class="form-control">
                <option value="">Selecciona editorial</option>
                @foreach($editoriales as $editorial)
                    <option value="{{$editorial['id_editorial']}}">{{$editorial['nombre']}}</option>
                @endforeach
            </select>
        </label>
    </p>
    <p>
    <div>¿Disponible?</div>
    <input id="si-disponible" type="radio" name="disponible" value="1" {{$datos['disponible'] ? ' checked' : ''}}> <label for="si-disponible">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"{{$datos['disponible'] ? ' checked' : ''}}> <label for="no-disponible">No</label>
    </p>
    <p>
        <input type="hidden" name="codigo" value="{{$datos['codigo']}}">
        <input class="btn btn-outline-primary" type="submit" value="Modificar">
        <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
    </p>
</form>
@endsection