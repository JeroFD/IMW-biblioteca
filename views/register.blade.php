@extends('plantilla')
@section('contenido')
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
            <h1 class="mx-auto w-25" >Registro</h1>
            @if(isset($errors) && count($errors) > 0)
                @foreach($errors as $error_msg)
                    <div class="alert alert-danger">{{$error_msg}}</div>
                @endforeach
            @endif
            @if(isset($success))
               <div class="alert alert-success">{{$success}}</div>
            @endif
            <form method="POST" action="{{$_SERVER['PHP_SELF']}}">
                <div class="form-group">
                    <label class="w-100" for="email">Nombre:
                        <input type="text" name="nombre" placeholder="Introduce un nombre" class="form-control w-100" value="{{($valFirstName ?? '')}}">
                    </label>
                </div>
                <div class="form-group">
                    <label class="w-100" for="email">Apellidos:
                        <input type="text" name="apellidos" placeholder="Introduce un apellido" class="form-control" value="{{($valLastName??'')}}">
                    </label>
                </div>

                <div class="form-group">
                    <label class="w-100" for="email">Email:
                        <input type="text" name="email" placeholder="Introduce un correo electrónico" class="form-control" value="{{($valEmail??'')}}">
                    </label>
                </div>

                <div class="form-group ">
                    <label class="w-100" for="email">Contraseña:
                        <input type="password" name="password" placeholder="Introduzca una contraseña" class="form-control" value="{{($valPassword??'')}}">
                    </label>
                </div>

                <button type="submit" name="submit" class="btn btn-outline-primary mt-2">Enviar</button>
                <p class="pt-2"> Volver a <a href="login.php">Iniciar sesión</a></p>
            </form>
        </div>
    </div>
</div>
@endsection

@section('piedepagina')
    <p>© 2022 - Jerónimo Omar Falcón Dávila</p>
@endsection