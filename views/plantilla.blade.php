<!doctype html>
<html lang="es">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            .half-black {
                background: rgba(0, 0, 0, 0.5);
            }
            img {
                height: 400px;
                width: 250px;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/fe280c8931.js" crossorigin="anonymous"></script>
        <title>Biblioteca</title>
    </head>
    <body class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Biblioteca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="admin/dashboard.php">Panel de usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin/dashboard2.php">Panel de administración</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li>
                            @if(isset($_SESSION['usuarios']))
                                <b>Usuario:</b> {{$_SESSION['usuarios']['nombre']}}
                                <a class='btn btn-outline-danger' href='logout.php'>Cerrar sesión</a>
                            @else
                                <a class='btn btn-warning' href='login.php'>Iniciar sesión</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container bg-white mt-5 pb-5">
            @yield('contenido')
        </div>
        <footer class="bg-light text-center mt-5 p-2">
            <p>© 2022 - Jerónimo Omar Falcón Dávila</p>
            @yield('piedepagina')
        </footer>
    </body>
</html>