<?php
session_start();
$usuario = $_REQUEST['Usuario'];
$contra = $_REQUEST['contrasena'];

require('conexion.php');

$conexion = new mysqli($host, $user, $passwd, $db);

if($conexion->connect_error){
    die("Error de conexion" .$conexion->connect_error);
}else{

    $sql = "SELECT * FROM Usuarios WHERE correo='$usuario' AND contrasena=md5('$contra')";

    $resultado = $conexion->query($sql);

    if($resultado->num_rows>=1){
        $fila = $resultado->fetch_assoc();
        $_SESSION['usuario']=$fila['nombre'];
        $_SESSION['tipo']=$fila['tipo'];
        $_SESSION['ref']=$fila['referencia'];
        header("Location: index.php");
    }else{
        header("Location: index.php?error=1");
    }

    $conexion->close();

}


?>