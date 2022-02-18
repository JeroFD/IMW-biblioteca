@extends('plantilla')

@section('contenido')
<h1>LIBROS</h1>
<div class="d-flex">
    <div class="row">
        @foreach ($libros as $l)
            <div class="col-md-auto w-25">
                <img class="img-thumbnail w-100" src="imagenes/libros/{{$l["portada"]}}" alt="">
            <div class="text-white half-black p-2">
                <h6> {{ $l["titulo"] }}</h6>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('piedepagina')
<p>© 2022 - Jerónimo Omar Falcón Dávila</p>
@endsection