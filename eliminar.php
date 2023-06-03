<?php
session_start();
$no = $_GET['no'];
    
require('conexion.php');
        
$conexion = new mysqli($host, $user, $passwd, $db);

if($conexion->connect_error){
    die("Error de conexion: ". $conexion->connect_error);    
}

$sql = "DELETE FROM Usuarios WHERE id=$no";

if($conexion->query($sql) === TRUE){
    header("Location: Estadisticas.php");
}else{
    header('Location: Estadisticas.php?error=3');
}
?>