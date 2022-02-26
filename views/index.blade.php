@extends('plantilla')
@section('contenido')

<h1 class="text-center">LIBROS</h1>
    <form class="d-flex" method="post">
        <div class="input-group w-100">
            <input class="form-control" type="text" name="buscar"/>
            <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </form>
<div class="d-flex">
    <div class="row">
        @foreach ($libros as $l)
            <div class="col-md-auto">
                <img class="img-thumbnail w-100" src="imagenes/libros/{{$l["portada"]}}" alt="">
            <div class="text-white half-black p-2">
                <h6> {{ $l["titulo"] }}</h6>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection