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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunicación en Sistemas de Detección de Perturbaciones</title>
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
                <h2 class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-dark text-decoration-none"> Comunicación en detección de perturbaciones en señales eléctricas</h2>
                <span id="Usuario" class="nav-link px-2 link-primary"> Bienvenido <?=$Inicio;?></span>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                  <li><a href="index.php" class="nav-link text-secondary"><img src="icons/house-door.svg" class="bi d-block mx-auto mb-1" width="30" height="30" />Home</a></li>
                  <li><a href="Estadisticas.php" class="nav-link text-dark"><img class="bi d-block mx-auto mb-1" width="30" height="30" src="icons/clipboard2-data.svg"/>Estadisticas</a></li>
                  <li><a href="Registro.php" class="nav-link text-dark"><img src="icons/person-circle.svg" class="bi d-block mx-auto mb-1" width="30" height="30"/>Registro</a></li>
                  <li><a href="Acerca de.php" class="nav-link text-dark"><img src="icons/question-circle.svg" class="bi d-block mx-auto mb-1" width="30" height="30"/>Acerca de</a></li>
                </ul>
              </div>
            </div>
          </div>    
    </header>
    <div id="contenedor">
        <div class="text-center border-bottom">
                <img src="img/ejem1.png" class="border rounded-3 shadow-lg mb-4" alt="Example image" width="90%" height="270" loading="lazy">
        </div>
        <main id="contenido">
            <section id="superior">
                <div class="row align-items-top g-lg-3 py-3">
                    <div class="col-lg-8  text-lg-start">
                        <p class="fs-10  px-5 ">La calidad de la energía implica entregar una forma de onda de voltaje suave y constante a los consumidores. Los problemas de calidad de la energía se encuentran principalmente en formas de onda de voltaje variable y frecuencia de suministro. Estas perturbaciones de forma de onda acompañadas de distorsiones de corriente y voltaje pueden ser causadas por patrones de carga cambiantes. Por lo tanto, es esencial que las empresas de servicios públicos detecten y clasifiquen esas perturbaciones, ya que mejorarán el rendimiento de la red eléctrica. La infraestructura de medición avanzada (AMI) se basa en el uso de redes y sistemas de medición de energía bidireccionales capaces de medir, recolectar, analizar el uso de la energía y posteriormente realizar una toma de decisiones [1,2].</p>
                        <p class="fs-10  px-5 ">La comunicación en SG se divide en tres regiones: LAN, NAN y WAN, la primera permite la comunicación entre los usuarios y los medidores inteligentes, el segundo ayuda a realizar procesos con los datos antes de ser transmitidos a la nube y el ultimo es responsable de comunicar los datos entre la nube y su destino [3]. De acuerdo con [3], los protocolos de comunicación inalámbrica utilizados con mayor frecuencia en AMI son los siguientes:</p>
                    </div>
                    <div class="col-md-7 mx-auto col-lg-3">
                        <?php
                            if(isset($_SESSION['usuario'])){
                                ?>
                                    <form  class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                                        <div class="text-center"><h4>Cerrar sesión</h4>
                                        </div>
                                        
                                        <div id="registro" class="text-center p-1">
                                            <button class="w-40 btn btn-lg btn-outline-primary" type="submit"><a href="cerrar.php">Cerrar sesión</a></button>  
                                        </div> 
                                    </form>
                                <?php
                            }
                            else{

                                ?>
                                    <form action="login.php" method="get" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                                        <div class="text-center"><h4>Iniciar sesión</h4>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="Usuario" name="Usuario" required>
                                            <label for="Usuario">Correo <span class="text-danger centrar">pruebe: arzate2323@gmail.com</span></label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                                            <label for="contrasena">Contraseña <span class="text-danger centrar">pruebe:M17121144a</span></label>
                                        </div>
                                        <div id="registro" class="text-center p-1">
                                            Aún no tienes cuenta? <a  href="Registro.html">Registrate</a>
                                            <button class="w-40 btn btn-lg btn-outline-primary" type="submit">Acceder</button>  
                                        </div> 
                                        <?php
                                            if($error == 1){
                                            ?>
                                                <div class="text-danger centrar">
                                                Usuario y/o contraseña no encontrado.
                                                </div>

                                            <?php
                                                }
                                            ?>
                                        </form>
                                <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </section>
            <section id="inferior">
                <div class="row  g-lg-3 py-3">
                    <div class="col-lg-4 text-center text-lg-start">
                        <img src="img/beagle.jpg"  alt="Imagen de beaglebone" width="95%"  >
                    </div>
                    <div class="col-md-7 mx-auto col-lg-7">
                        <p><strong> Red de área local</strong>
                            <br>
                            <strong>Zigbee:</strong>
                            Zigbee es una tecnología de comunicación desarrollada según el estándar IEEE 802.15.4 que transmite datos a una velocidad aproximada de 250 Kbps en una frecuencia de 2,4 GHz. La tecnología está dirigida a aplicaciones que requieren un corto alcance de comunicación, 0-100 m.
                        <p><strong>Wifi:</strong>
                            Está diseñado de acuerdo con el estándar IEEE 802.11b/g/n con capacidad de transmisión de datos en frecuencias de 2,4 y 5 GHz en el dominio de 0-250 m a una velocidad de 54 Mbps. El dominio de Wi-Fi es más grande en comparación con Zigbee. También proporciona una tasa de transmisión de datos relativamente más alta a costa de la escalabilidad.  
                        <p><strong>Bluetooth:</strong>
                            Bluetooth es otra tecnología que se puede utilizar para redes domésticas en el sistema SG, ya que tiene un rango de comunicación de baja energía limitado de (0-100 m). Esta tecnología está desarrollada según el estándar IEEE 802.15.1 para transferir datos a una velocidad de 721 Kbps y una frecuencia de 2,4 GHz. 
                        <p><strong>Z-wave:</strong>  
                            La tecnología Z-wave es una comunicación basada en radiofrecuencia diseñada principalmente para el control remoto de electrodomésticos que se basa en una frecuencia de 900 MHz sin licencia que transmite datos a una velocidad que alcanza los 40 kbps para un rango de 0-30m.
                        <p><strong>NFC:</strong>    
                            Near Field Communication (NFC) es un conjunto de protocolos de corto alcance que funcionan en un rango de aproximadamente 10 cm y sus objetivos pueden ser dispositivos simples como adhesivos, tarjetas o etiquetas sin alimentación adjuntas al SM en una AMI. 
                        <p><strong>Redes vecinales y de área amplia (NAN y WAN)</strong><br>
                            <strong>NB-IoT:</strong><br>
                            La tecnología NB-IoT juega un papel importante en la AMI de un SG. La tecnología consta de modos celulares 2G, 3G y 4G que brindan la capacidad de transmisión de big data que va desde 14,4 kbps (para 2G) hasta 100 Mbps (para 4G) en una banda de frecuencia con licencia (824 MHz y 1900 MHz). La tecnología apunta a un área grande debido a su largo dominio que oscila entre 10 y 100 km. Dicho esto, la tecnología NB-IoT consume mucha energía para el proceso de transmisión. 
                        <p><strong>Sigfox:</strong>
                            Sigfox es una solución de comunicación WAN de máquina a máquina en desarrollo que opera en una banda de frecuencia de 868 MHz que tiene la capacidad de cubrir 30-50 km en áreas rurales y 3-10 km en áreas urbanas para entregar los datos a una velocidad de 100 bps. Una ventaja de esta tecnología es su bajo consumo de energía para la transmisión de datos. 
                        <p><strong>LoRaWAN:</strong>
                            LoRaWAN es una organización sin fines de lucro reciente que se estableció principalmente para integrarse en aplicaciones WAN de Internet de las cosas (IoT). La tecnología opera a una frecuencia de 900 MHz para transmitir datos a una velocidad de 50 kbps en un rango de distancia de 10 a 15 km en áreas rurales y de 2 a 5 km en áreas.
                        <p><strong>Wi-SUN:</strong>
                            Esta tecnología de comunicación se desarrolla de acuerdo con el estándar IEEE 802.15.4g en el que opera a una frecuencia baja de 900 MHz para transmitir los datos recopilados a una velocidad de 300 Kbps para un dominio de área de aproximadamente 500 m – 5 km.
                        <p><strong>LoRa</strong>
                            LoRa es una capa física en la solución de red de área amplia de baja potencia (LPWAN) diseñada por Semtech Corporation, que también fabrica los conjuntos de chips. La tecnología LoRa contiene dos componentes principales. Uno de ellos es el protocolo de red LoRaWAN y el otro es modulación LoRa. El rango de cobertura de LoRa es de 10 a 15 km en áreas rurales y de 3 a 5 km en áreas urbanas. Además, en términos de velocidades de datos, LoRa tiene una velocidad de datos entre 0,3 y 37,5 kbps.  
                    </div>
                </div>
            </section>
            <div id="citas" class="border-top">  
                Referencias
                <p>
                    <br>
                    [1] “Aplicación de tecnologías de medición avanzada AMI”. Trilliant company [En línea]. Disponible en:  <a href="https://primestone.com/aplicacion-tecnologias-de-medicion-avanzada-ami/#:~:text=La%20infraestructura%20de%20medición%20avanzada%20(AMI),%20se%20refiere,gestionar%20toda%20la%20información%20recolectada%20y%20tomar%20decisiones"> https://primestone.com/aplicacion-tecnologias-de-medicion-avanzada-ami/#:~:text=La%20infraestructura%20de%20medición%20avanzada%20(AMI),%20se%20refiere,gestionar%20toda%20la%20información%20recolectada%20y%20tomar%20decisiones</a>. [Consultado: 12 de marzo de 2023].
                    <br>
                    [2] “Tecnología AMI: la medición necesaria”. TEC-EOS [En línea]. Disponible en: <a href="https://tec-eos.com/tecnologia-ami-la-medicion-necesaria/"> https://tec-eos.com/tecnologia-ami-la-medicion-necesaria/</a> [Consultado el 12 de marzo de 2023].
                    <br>
                    [3] F. Al-Turjman y M. Abujubbeh, “IoT-enabled smart grid via SM: An overview”, Future Gener. Comput. Syst., vol. 96, pp. 579–590, julio de 2019. [En línea]. Disponible: <a href="https://doi.org/10.1016/j.future.2019.02.012"> https://doi.org/10.1016/j.future.2019.02.012</a>. [Consultado: 14 de marzo de 2023].
                </p>
            </div>
        </main>
    </div>
    <footer id="pie" class=" my-2">
        <p class="text-center text-body-secondary border-top">&copy; Todos los Derechos reservados, Mayo 2023</p>
    </footer>
</body>
</html>