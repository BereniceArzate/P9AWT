<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        $Inicio = $_SESSION['usuario'];
    }
    else{
        $Inicio = " ";
    }
    $RefUs=$_SESSION['ref'];
    require("conexion.php");
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
    <script src="js/plotly-2.20.0.min.js"></script>
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
                  die("Error al conectarse a la base de datos".$conn->connect_error);
              }else{
                $sql = "SELECT * FROM Usuarios";
                $resultado = $conn->query($sql);
                $usuarios = $resultado->num_rows;
                if($usuarios>0){
                  ?>
                    <table class="table ">
                        <thead>
                          <tr class="table-active">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo</th>
                            <th>Referencia</th>
                            <th>Contraseña</th>
                            <th>Tipo</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                      while($fila = $resultado->fetch_assoc()){
                      ?>
                          <tr>
                            <td><?=$fila['id'];?></td>
                            <td><?=$fila['nombre'];?></td>
                            <td><?=$fila['ap_paterno'];?></td>
                            <td><?=$fila['ap_materno'];?></td>
                            <td><?=$fila['correo'];?></td>
                            <td><?=$fila['referencia'];?></td>
                            <td><?=$fila['contrasena'];?></td>
                            <td><?=$fila['tipo'];?></td>
                            <td>                             
                              <div class="btn-group">
                                <a href="consulta.php?nr=<?=$fila['referencia'];?>" class="btn btn-primary" aria-current="page">Historial</a>
                                <a href="modificacion.php?no=<?=$fila['id'];?>" class="btn btn-primary">Modificar</a>
                                <a href="eliminar.php?no=<?=$fila['id'];?>" class="btn btn-primary btn-danger">Borrar</a>
                              </div>

                            </td>
                          </tr>
                      <?php
                    }
                      ?>
                        </tbody>
                      </table>
                  <?php
                }else{
                  ?>
                    <div class="bg-dark text-white">No hay usuarios registrados.</div>
                  <?php
                    }
              }
                $conn->close(); 
            ?>
            <?php
          }else if(isset($_SESSION['usuario']) && $_SESSION['tipo']!= 1)  {

            $conn = new mysqli($host, $user, $passwd, $db);
            if ($conn->connect_error){
                die("Error al conectarse a la base de datos".$conn->connect_error);
            }else{
              $sql = "SELECT* FROM referencia WHERE referencia=$RefUs "; // Consulta SQL

              $query = $conn->query($sql); // Ejecutar la consulta SQL
              $data = array(); // Array donde vamos a guardar los datos
              while($fila = $query->fetch_assoc()){ // Recorrer los resultados de Ejecutar la consulta SQL
                #$data[0]= $fila['referencia'];
                $data[1]=$fila['Transitorios'];
                $data[2]=$fila['Variaciones de corta duración'];
                $data[3]=$fila['Variaciones de larga duración'];
                $data[4]=$fila['Distorsión en la forma de onda'];
                $data[5]=$fila['Variaciones de frecuencia'];
             
                  
              }

              $data2[0]='Transitorios'; 
              $data2[1]='Variaciones de corta duración';
              $data2[2]='Variaciones de larga duración';
              $data2[3]='Distorsión en la forma de onda';
              $data2[4]='Variaciones de frecuencia';
             
              $datosX=json_encode($data2);
              $datosY=json_encode($data);
            
              ?>
              <br>
              <div id="GraficadeBarras"></div>
              <br>
              <script type="text/javascript">
                  function crearCadenaBarras(json){
                      var parsed = JSON.parse(json);
                      var arr = [];
                      for(var x in parsed){
                          arr.push(parsed[x]);
                      }
                      return arr;
                  }
              </script>
              <script type="text/javascript">
                  datosX=crearCadenaBarras('<?php echo $datosX ?>');
                  datosY=crearCadenaBarras('<?php echo $datosY ?>');

                  var trazo = {
                      x: datosX,
                      y: datosY,
                      type: 'bar'
                  };
                  var data = [trazo];
                  Plotly.newPlot('GraficadeBarras', data);
              </script>
              ?>
            
            <?php
            }
          }else {
            ?>
            <section>
                <article id="datos">
                    <p class="fs-10  px-5 py-3">En las siguientes figuras se muestran el total de perturbaciones detectadas para todos los usuarios de la red</p>
                </article>
                <article id="Graficas">
                    <div class="album py-5 bg-body-tertiary">
                        <div class="container">
                          <div class="row row-cols-1 row-cols-sm-2 g-5">
                            <div class="col">
                              <div class="card shadow-sm">
                              
                                <img src="img/gra1.png" class="bd-placeholder-img card-img-top" width="100%">
                                <div class="card-body">
                                  <p class="card-text">Descripción de la gráfica.</p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card shadow-sm">
                                <img src="img/gra2.png" class="bd-placeholder-img card-img-top" width="100%">
                                <div class="card-body">
                                  <p class="card-text">Descripción de la gráfica.</p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section> 
            <?php
          }
          ?>
        </main> 
    </div>
    <footer id="pie" class=" my-2">
        <p class="text-center text-body-secondary border-top">&copy; Todos los Derechos reservados, Mayo 2023</p>
    </footer>
</body>
</html>