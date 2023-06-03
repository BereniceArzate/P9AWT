<?php
//REQUEST incluye GET y POST
$nombre = $_REQUEST['nombre'];
$ap_paterno = $_REQUEST['ap_paterno'];
$ap_materno = $_REQUEST['ap_materno'];
$correo = $_REQUEST['correo'];
$numref = $_REQUEST['numref'];
$Password = $_REQUEST['contra'];
//echo "<h1>$usuario<h1>";
//include("conexion.php");
require("conexion.php");

$conn = new mysqli($host, $user, $passwd, $db);
if($conn->connect_error){
    die("Error al conectar la base de datos: ");  
    
}else{
   
    $sql2 = "INSERT INTO Usuarios (nombre, ap_paterno, ap_materno, correo, referencia, contrasena) VALUES ('$nombre', '$ap_paterno', '$ap_materno', '$correo', '$numref', md5('$Password'));";
    $resultado = $conn->query($sql2);
    header("Location: Registro.php?error=0"); 
}

?>

            