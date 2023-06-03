<?php
session_start();
$nr = $_GET['nr'];
if(isset($_SESSION['usuario'])){
    $Inicio = $_SESSION['usuario'];
}
else{
    $Inicio = " ";
}
    
require('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <script src="js/funciones.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="contenido">
        <header id="encabezado" class="border-bottom">
            <div class="px-3 py-2 text-bg-white>
                <div class="container">
                  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <?php
                    if(isset($_SESSION['tipo'])){
                      ?>
                      <h2 class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-dark text-decoration-none"> Administrar e Historial</h2>
                      <?php
                      }else{
                        ?>
                      <h2 class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-dark text-decoration-none"> Perturbaciones detectadas en el último mes</h2>
                      <?php
                      }
                    ?>
                    <span id="Usuario" class="nav-link px-2 link-primary"> Bienvenido <?=$Inicio;?></span>
                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                      <li><a href="index.php" class="nav-link text-dark"><img src="icons/house-door.svg" class="bi d-block mx-auto mb-1" width="30" height="30" />Home</a></li>
                      <li><a href="Estadisticas.php" class="nav-link text-secondary"><img class="bi d-block mx-auto mb-1" width="30" height="30" src="icons/clipboard2-data.svg"/>Estadisticas</a></li>
                      <li><a href="Registro.php" class="nav-link text-dark"><img src="icons/person-circle.svg" class="bi d-block mx-auto mb-1" width="30" height="30"/>Registro</a></li>
                      <li><a href="Acerca de.php" class="nav-link text-dark"><img src="icons/question-circle.svg" class="bi d-block mx-auto mb-1" width="30" height="30"/>Acerca de</a></li>
                    </ul>
                  </div>
                </div>
            </div> 
        </header>
        <main id="contenido">
          <?php
          if(isset($_SESSION['tipo'])){
            $conn = new mysqli($host, $user, $passwd, $db);
              if ($conn->connect_error){
                  die("Error de conexion".$conn->connect_error);
              }else{
                $sql = "SELECT* FROM referencia WHERE referencia=$nr";
                $resultado = $conn->query($sql);
                $usuarios = $resultado->num_rows;
                if($usuarios>0){
                  ?>
                    <table class="table ">
                        <thead>
                          <tr class="table-active">
                            <th>Referencia</th>
                            <th>Transitorios</th>
                            <th>Variaciones de corta duración</th>
                            <th>Variaciones de larga duración</th>
                            <th>Distorsión en la forma de onda</th>
                            <th>Variaciones de frecuencia</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                      while($fila = $resultado->fetch_assoc()){
                      ?>
                          <tr>
                            <td><?=$fila['referencia'];?></td>
                            <td><?=$fila['Transitorios'];?></td>
                            <td><?=$fila['Variaciones de corta duración'];?></td>
                            <td><?=$fila['Variaciones de larga duración'];?></td>
                            <td><?=$fila['Distorsión en la forma de onda'];?></td>
                            <td><?=$fila['Variaciones de frecuencia'];?></td>
                            <td>                             
                              <div class="btn-group">
                              
                              <a class="btn btn-outline-success" href="Estadisticas.php" role="button">Regresar</a>
                              </div>

                            </td>
                            </tr>
                      <?php
                    }
                      ?>
                        </tbody>
                      </table>
                  <?php
                }
              }
                $conn->close(); 
            }
            ?>
        </main> 
    </div>
    <footer id="pie" class=" my-2">
        <p class="text-center text-body-secondary border-top">&copy; Todos los Derechos reservados, Mayo 2023</p>
    </footer>
</body>
</html>