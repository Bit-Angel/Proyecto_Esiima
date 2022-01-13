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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Control Escolar </title>
	<link rel="stylesheet" href="menuControl.css">
</head>
<body>

	<div class="header">
			<div class="logo">
				<a href="../../index.html"><img class="logo-img" src="./imagenes/logoesiima.jpg" alt="logo-esiima"></a>
			</div>
			<div class="links">
				<a href=".././Vista-Al.php" class="header-txt">INICIO</a>
				<a href="#" class="header-txt">CONTROL ESCOLAR</a>
				<a href="../cajas/cajas.php" class="header-txt">CAJAS</a>
				<a href=".././Log-ALUMNO.html" class="header-txt Salir"><p>SALIR</p></a>
			</div>
    </div>

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
