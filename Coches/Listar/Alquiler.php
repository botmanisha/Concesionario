<?php
session_start();
$tipo = $_SESSION['tipo'];
$conexion = mysqli_connect ("localhost", "root", "rootroot")
or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion,"concesionario")
or die ("No se puede seleccionar la base de datos");

$coche = $_POST['coche'];
$iduser = $_SESSION['iduser'];

$insert = "insert into alquileres(id_usuario,id_coche,prestado ) values('$iduser', '$coche', now()) " ;
mysqli_query($conexion, $insert);

$update = "update coches set alquilado = 1 where id_coche='$coche'" ;
mysqli_query($conexion, $update);

header('location: ./C_Listar.php');
?>
