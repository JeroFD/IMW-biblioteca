<?php
    if (isset($_SESSION["id"])) {
        header('login.php');
    }
?>
<h1>Panel del alumnado</h1>
<ul>
    <li><a>Libros</a></li>
    <li><a>Categorias</a></li>
    <li><a>Editoriales</a></li>
    <li><a>Autores</a></li>
    <li><a>Usuarios</a></li>
</ul>

<ul>
    <li><a>Prestamos</a></li>
    <li><a>Devoluciones</a></li>
    <li><a>Sanciones</a></li>
</ul>