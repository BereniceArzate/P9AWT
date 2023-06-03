<?php
//REQUEST incluye GET y POST
$nombre = $_REQUEST['nombre'];
$ap_paterno = $_REQUEST['ap_paterno'];
$ap_materno = $_REQUEST['ap_materno'];
$correo = $_REQUEST['correo'];
$numref = $_REQUEST['numref'];
$Password = $_REQUEST['contra'];
$num = $_REQUEST['ident'];

require("conexion.php");


$conn = new mysqli($host, $user, $passwd, $db);
if($conn->connect_error){
    die("Error al conectar la base de datos: ");  
    
}else{
    $sql = "UPDATE Usuarios SET nombre = '$nombre', ap_paterno = '$ap_paterno', ap_materno = '$ap_materno', correo = '$correo', referencia = '$numref', contrasena = md5('$Password') WHERE id = '$num'";
    $resultado = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
       header("Location: modificacion.php?error=0"); 
    }else{
        header("Location: modificacion.php?error=3"); 
    }
    
}

?>

