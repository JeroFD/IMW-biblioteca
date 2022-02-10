@extends('plantilla')

<h1>LIBROS</h1>
@section('contenido')
    @foreach ($libros as $l)
    <div class="row">
        <div class="flex-column">
                <img class="img-thumbnail" src="imagenes/libros/{{$l["portada"]}}" alt="">
                <h4>{{ $l["titulo"] }}</h4>
        </div>
    </div>
    @endforeach
@endsection
