<!DOCTYPE html>
<?php
require 'functions.php';
$permisos = ['Administrador','Profesor','Padre'];
permisos($permisos);

?>
<html>
<head>
<title>Inicio | Registro de Notas</title>
    <meta name="description" content="Registro de Notas del Centro Escolar Profesor Lennin" />
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
<div class="header">
        <h1>Registro de Notas - Centro Escolar "Profe Lennin"</h1>
        <h3>Usuario:  <?php echo $_SESSION["username"] ?></h3>
</div>
<nav>
    <ul>
        <li class="active"><a href="inicio.view.php">Inicio</a> </li>
        <li><a href="alumnos.view.php">Registro de Alumnos</a> </li>
        <li><a href="listadoalumnos.view.php">Listado de Alumnos</a> </li>
        <li><a href="notas.view.php">Registro de Notas</a> </li>
        <li><a href="listadonotas.view.php">Consulta de Notas</a> </li>
        <li class="right"><a href="logout.php">Salir</a> </li>

    </ul>
</nav>

<div class="body">
    <div class="panel">
           <h1 class="text-center">Centro Escolar "Profe Lennin"</h1>
        <?php
        if(isset($_GET['err'])){
            echo '<h3 class="error text-center">ERROR: Usuario no autorizado</h3>';
        }
        ?>
        <br>
        <hr>
        <p class="text-center"><strong>Integrantes GRUPO 5</strong><br><br>José Saúl Rodríguez Guardado<br>Eduardo Antonio	Ramirez Carias<br>Vladimir Alcides	Salguero Erazo</p>
        <br>
        </div>
</div>

<footer>

    <p>Derechos reservados &copy; 2020</p>
</footer>

</body>

</html>