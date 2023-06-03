<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        $Inicio = $_SESSION['usuario'];
    }
    else{
        $Inicio = " ";
    }
    $error = 0;
    if(isset($_GET['error'])){
        $error = $_GET['error'];
    }

    if(isset($_GET['no'])){
        $id = $_GET['no'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    <header id="encabezado" class="border-bottom">
        <div class="px-3 py-2 text-bg-white>
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <h2 class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-dark text-decoration-none">Registro</h2>
                <span id="Usuario" class="nav-link px-2 link-primary"> Bienvenido <?=$Inicio;?></span>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                  <li><a href="index.php" class="nav-link text-dark"><img src="icons/house-door.svg" class="bi d-block mx-auto mb-1" width="30" height="30" />Home</a></li>
                  <li><a href="Estadisticas.php" class="nav-link text-dark"><img class="bi d-block mx-auto mb-1" width="30" height="30" src="icons/clipboard2-data.svg"/>Estadisticas</a></li>
                  <li><a href="Registro.php" class="nav-link text-secondary"><img src="icons/person-circle.svg" class="bi d-block mx-auto mb-1" width="30" height="30"/>Registro</a></li>
                  <li><a href="Acerca de.php"nav-link text-dark"><img src="icons/question-circle.svg" class="bi d-block mx-auto mb-1" width="30" height="30"/>Acerca de</a></li>
                </ul>
              </div>
            </div>
          </div>    
    </header>
    <main id="contenido_Reg">
        <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header border-bottom-0">
                        <h1 class="modal-title fs-5">Registro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="Cerrar()" id="cerrar"></button>
                    </div>
                    <div class="modal-body py-0">
                        <form class="p-3 p-md-4" action="actualizar.php" method="get">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="ident" name="ident" value="<?=$id?>" required>
                                <label for="ident">ID <span class="text-danger centrar">No modificar</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombre" name="nombre"  required>
                                <label for="nombre">Nombre(s)</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="ap_paterno"  name="ap_paterno" required>
                                <label for="ap_paterno">Apellido Paterno</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="ap_materno"  name="ap_materno" required>
                                <label for="ap_materno">Apellido Materno</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="correo"  name="correo" required>
                                <label for="correo">Correo electrónico</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="numref" name="numref" required>
                                <label for="numref">Número de Referencia</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="contra" name="contra" required>
                                <label for="contra">Contraseña</label>
                            </div>

                            <div class="d-flex gap-2 justify-content-center py-2">
                                <button class="btn btn-secondary d-inline-flex align-items-center" type="button" >
                                Cancelar
                                </button>
                                    <button class="btn btn-outline-primary d-inline-flex align-items-center" type="submit" >
                                    Actualizar Datos
                                    </button>
                                    <?php
                                        if(isset($_GET['error']) && $error == 0){
                                            ?>
                                                <div class=" text-danger centrar">
                                                Cambios registrados con exito.
                                                </div>
                                            <?php
                                        }  else if($error ==3){
                                            ?>
                                                <div class=" text-danger centrar">
                                                Error, intente mas tarde.
                                                </div>
                                            <?php
                                        }
                            ?>
                            </div>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </main> 
    <footer id="pie" class=" my-2">
        <p class="text-center text-body-secondary border-top">&copy; Todos los Derechos reservados, Mayo 2023</p>
    </footer> 
</body>
</html>