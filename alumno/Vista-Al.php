

<!DOCTYPE html>
<?php
    session_name("usuario");
    session_start();
    if ($_SESSION["autentificado"] != "SI") {
        //si no está logueado lo envío a la página de autentificación
        header("Location: index.php");
    } else {
        //sino, calculamos el tiempo transcurrido
        $fechaGuardada = $_SESSION["ultimoAcceso"];
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
        if($tiempo_transcurrido >= 600) {
            //si pasaron 10 minutos o más
            session_destroy(); // destruyo la sesión
             header("Location: Log-Al.php"); //envío al usuario a la pag. de autenticación
        //sino, actualizo la fecha de la sesión
        }else {
        $_SESSION["ultimoAcceso"] = $ahora;
        }
    }
    $id = $_SESSION['usuario-btn'];

    $servidor="localhost";
    $usuario="proyecto";
    $pass="Esima@123";
    $db="proyecto";
    
    $conexion = mysqli_connect($servidor,$usuario,$pass,$db);
    if(!$conexion){
        echo "Error: No se puede conectar a la base de datos MySQL".PHP_EOL;
        echo "Errno: Errno de depuracion".mysqli_connect_errno().PHP_EOL;
        echo "Error: Error de depuracion".mysqli_connect_error().PHP_EOL;
        exit;
    }
    
    $query = "SELECT * FROM alumno WHERE id = '$id'";
    //Ejecutamos el query
    $alumno = mysqli_query($conexion,$query);
    
    $datos=mysqli_fetch_array($alumno);
    $suma=0;
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <link rel="stylesheet" href="./css/master_principal.css">
</head>
<body>

    		<div class="header">
    			<div class="logo">
    				<a href="../index.html"><img class="logo-img" src="imagenes/logoesiima.jpg" alt="logo-esiima"></a>
    			</div>
    			<div class="links">
    				<a href="#" class="header-txt">INICIO</a>
    				<a href="./controlEscolar/menuControl.php" class="header-txt">CONTROL ESCOLAR</a>
    				<a href="./cajas/cajas.php" class="header-txt">CAJAS</a>
    				<a href="./Log-ALUMNO.html" class="header-txt Salir"><p>SALIR</p></a>
    			</div>
    		</div>

    		<main class="main">
    			<h3 class="one_more">¡HOLA!</h3>
                <br>
        <h1><?php echo $datos['nombres']." ".$datos['apellidos'];?></h1>
                <br>
        <h4><span style="color:grey">INGENIERÍA EN SISTEMAS COMPUTACIONALES</span></h4>
                <br>
        <h3 class="bases"><?php echo $datos['id'];?></h3>

    		</main>
            <div class="otro_mas">
                <div class="semestre"><h3>SEMESTRE</h3></div>
                <div class="linea1"></div>
                <div class="promedio"><h3>PROMEDIO GENERAL</h3></div>
                <div class="linea2"></div>
                <div class="situacion"><h3>SITUACIÓN ACTUAL</h3></div>
            </div>

            <div class="segundo">
                <div class="cinco"><h3><?php echo $datos['grado'];?></h3></div>
                    <?php 
                        $query = "SELECT * FROM materia WHERE id_alumno = '$id'";
                        
                        $alumno = mysqli_query($conexion,$query);
                        
                        while($datos = mysqli_fetch_array($alumno)){
                            $suma = $suma+$datos['calificacion'];
                            $promedio=$suma/3;
                        } 
                    ?>
                <div class="calificacion"><h2><?php echo $promedio;?></h2></div>
            <div class="icono2">
            <img class="icono_check" src="./imagenes/icono_check.svg" alt="icono_check" height="80px" width="80px"/>
            </div>
            </div>
            <div class="link2" >
                <a href="#" class="regular" style="color:black">Regular</a>
            </div>

    <div class="ola" style="height: 105px; overflow: hidden;" >
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%; "><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #006ba1;"></path></svg>
    </div>
    <div class="ola2" style="height: 105px; overflow: hidden;" >
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%; "><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #006ba180;"></path></svg>
    </div>

    <script src="java.js"></script>
</body>
</html>
