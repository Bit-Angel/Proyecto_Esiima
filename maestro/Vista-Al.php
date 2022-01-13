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

$query = "SELECT * FROM maestro WHERE id = '$id'";
//Ejecutamos el query
$maestro = mysqli_query($conexion,$query);

$datos=mysqli_fetch_array($maestro);

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Maestros</title>
    <link rel="stylesheet" href="./css/master_principal_mae.css">
</head>
<body>

    		<div class="header">
    			<div class="logo">
    				<a href=".././index.html"><img class="logo-img" src="imagenes/logoesiima.jpg" alt="logo-esiima"></a>
    			</div>
    			<div class="links">
    				<a href="#" class="header-txt">INICIO</a>
    				<a href="./Inscritos/verAlumnos.php" class="header-txt">ALUMNOS INSCRITOS</a>
    				<a href="./CalificacionFaltas/calificar.php" class="header-txt">CALIFICAR</a>
    				<a href=".././index.html" class="header-txt Salir"><p>SALIR</p></a>
    			</div>
    		</div>

    		<main class="main">
    			<h3 class="one_more">¡BIENVENIDO!</h3>
                <br>
        <h1><?php echo $datos['nombre']." ".$datos['apellidos'];?></h1>
                <br>
        <h4><?php echo $datos['id'];?></h4>
                <br>
        <h3 class="bases"><span style="color:gray"><?php echo $datos['materia']?></span></h3><br>
        <h3 class="bases"><span style="color:gray">Ing. Sistemas Computacionales</span></h3>

    		</main>
            <div class="otro_mas">
            <div class="icono1">
            <img class="icono_starlist" src="./imagenes/icono_starlist.svg" alt="icono_starlist" height="120px" width="120px"/>
            </div>
            <div class="icono2">
            <img class="icono_lapiz" src="./imagenes/icono_lapiz.svg" alt="icono_lapiz" height="120px" width="120px"/>
            </div>
            </div>

            <div class="link2" >
                <a href="./Inscritos/verAlumnos.php" class="ver" style="color:black">VER ALUMNOS INSCRITOS</a>
                <a href="./CalificacionFaltas/calificar.php" class="calificar" style="color:black">CALIFICAR ALUMNOS</a>
            </div>

            <div class="ola" style="height: 105px; overflow: hidden;" >
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%; "><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #7767BD;"></path></svg>
            </div>
            <div class="ola2" style="height: 105px; overflow: hidden;" >
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%; "><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #7767BD80;"></path></svg>
            </div>

</body>
</html>
