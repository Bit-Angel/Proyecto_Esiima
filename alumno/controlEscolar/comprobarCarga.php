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
        if($tiempo_transcurrido >= 60) {
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
    
    $query = "SELECT * FROM maestro WHERE nombre = 'root'";
    $admin = mysqli_query($conexion,$query);
    $datos = mysqli_fetch_array($admin);
    $aux = $datos['contrasena'];
    if($aux==0){
        $mensaje = "Carga Academica No Permitida";
    }else{
        $query = "SELECT * FROM alumno WHERE id = '$id'";
        $alumno = mysqli_query($conexion,$query);
        $datos = mysqli_fetch_array($alumno);
        $aux = $datos['colegiatura'];
        if ($aux>0) {
            $mensaje = "Adeudo Detectado";
        }else{
            $query = "SELECT * FROM materia WHERE id_alumno = '$id'";
            $alumno = mysqli_query($conexion,$query);
             $suma=0;           
            while($datos = mysqli_fetch_array($alumno)){
                            $suma = $suma+$datos['calificacion'];
                            $promedio=$suma/3;
            } 
            if($promedio<=6){
                $mensaje = "Adeudo De Materias Detectado";
            }else{
                $query = "SELECT * FROM alumno WHERE id = '$id'";
                $alumno = mysqli_query($conexion,$query);
                $datos = mysqli_fetch_array($alumno);
                $query = "UPDATE alumno SET colegiatura='7500' WHERE id = '$id'";
                mysqli_query($conexion,$query);
                $aux = $datos['grado'];
                $aux = $aux + 1; 
                $query = "UPDATE alumno SET grado='$aux' WHERE id = '$id'";
                mysqli_query($conexion,$query);
                $mensaje="Carga academica registrada con exito";
            }
            
        }
    
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Control Escolar </title>
	<link rel="stylesheet" href="menuCarga.css">
</head>
<body>

	<div class="header">
			<div class="logo">
				<a href="../../index.html"><img class="logo-img" src="./imagenes/logoesiima.jpg" alt="logo-esiima"></a>
			</div>
			<div class="links">
				<a href=".././Vista-Al.php" class="header-txt">INICIO</a>
				<a href="./menuControl.php" class="header-txt">CONTROL ESCOLAR</a>
				<a href="../cajas/cajas.php" class="header-txt">CAJAS</a>
				<a href=".././Log-ALUMNO.html" class="header-txt Salir"><p>SALIR</p></a>
			</div>
    </div>
    <h1 class="mensaje"><?php echo $mensaje;?></h1>
    <main class="main">
        
        <a href="./comprobarCarga.php" class="op1">
            <img class="imag" src="./imagenes/carga.png" alt="icono-calificaciones">
			<p class="piet">REGISTAR CARGA ACADEMICA</p>
        </a>

        <a href="./baja.php" class="op2">
            <img class="imag" src="./imagenes/baja.png" alt="icono-baja">
			<p class="piet">DARSE DE BAJA</p>
        </a>
    </main>
</body>
</html>