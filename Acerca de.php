<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        $Inicio = $_SESSION['usuario'];
    }
    else{
        $Inicio = " ";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <header id="encabezado" class="border-bottom">
        <div class="px-3 py-2 text-bg-white>
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <h2 class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-dark text-decoration-none"> Acerca de</h2>
                <span id="Usuario" class="nav-link px-2 link-primary"> Bienvenido <?=$Inicio;?></span>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                  <li><a href="index.php" class="nav-link text-dark"><img src="icons/house-door.svg" class="bi d-block mx-auto mb-1" width="30" height="30" />Home</a></li>
                  <li><a href="Estadisticas.php" class="nav-link text-dark"><img class="bi d-block mx-auto mb-1" width="30" height="30" src="icons/clipboard2-data.svg"/>Estadisticas</a></li>
                  <li><a href="Registro.php" class="nav-link text-dark"><img src="icons/person-circle.svg" class="bi d-block mx-auto mb-1" width="30" height="30"/>Registro</a></li>
                  <li><a href="Acerca de.php" class="nav-link text-secondary"><img src="icons/question-circle.svg" class="bi d-block mx-auto mb-1" width="30" height="30"/>Acerca de</a></li>
                </ul>
              </div>
            </div>
          </div>    
    </header>
    <main id="contenido">
            <p> Esta página web se creó como parte de la materia de Aplicaciones web para teleoperación y a partir del proyecto de investigación Detección de perturbaciones en señales eléctricas basado en IoT desarrollado en el Instituto Tecnológico de Morelia.
            <p><strong>Datos de contacto:</strong> 
                <br> Correo electrónico: <a href="mailto:arzate2323@outlook.com?subject=enlace HTML">arzate2323@outlook.com</a>
                <br> Página del oficial: <a href="https://www.morelia.tecnm.mx/">ITM</a>
                
    </main> 
    <footer id="pie" class=" my-2">
        <p class="text-center text-body-secondary border-top">&copy; Todos los Derechos reservados, Mayo 2023</p>
    </footer> 
</body>
</html>