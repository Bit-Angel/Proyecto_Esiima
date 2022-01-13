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
//Obtenemos el id de la sesion
$id = $_SESSION['usuario-btn'];
//Datos de conexion
$servidor="localhost";
$usuario="proyecto";
$pass="Esima@123";
$db="proyecto";
//Creamos conexion
$conexion = mysqli_connect($servidor,$usuario,$pass,$db);
if(!$conexion){
    echo "Error: No se puede conectar a la base de datos MySQL".PHP_EOL;
    echo "Errno: Errno de depuracion".mysqli_connect_errno().PHP_EOL;
    echo "Error: Error de depuracion".mysqli_connect_error().PHP_EOL;
    exit;
}
//echo "La conexion a la base de datos se ha realizado correctamente".PHP_EOL;

//Hacemos el query de la consulta
$query = "SELECT * FROM materia WHERE id_alumno = '$id'";
//Ejecutamos el query
$resultado = mysqli_query($conexion,$query);
//Guadamos en un array los datos del alumno
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Control Escolar </title>
    <link rel="stylesheet" href="./css/master_calificaciones.css">
</head>
<body>

    <div class="header">
		<div class="logo">
			<img class="logo-img" src="imagenes/logoesiima.jpg" alt="logo-esiima">
		</div>
		<div class="links">
			<a href="../Vista-Al.php" class="header-txt">INICIO</a>
			<a href="./menuControl.php" class="header-txt">CONTROL ESCOLAR</a>
			<a href="../cajas/cajas.php" class="header-txt">CAJAS</a>
			<a href= "../../index.html" class="header-txt Salir"><p>SALIR</p></a>
		</div>
	</div>

    <main class="main">
        <h2 class="titulo">CALIFICACIONES</h2>
        <br>
        <table class="tabla">
             <tr>
                <th>MATERIA</th>
                <th>CALIFICACION</th>
                <th>FALTAS</th>

            </tr>
            <?php while($mostrar=mysqli_fetch_array($resultado)){

            ?>

            <tr>
                <td><?php echo $mostrar['clase']?></td>
                <?php
                    if($mostrar['calificacion']<=6 || $mostrar['faltas']>=16){
                        echo "<td style='color:red;'>".$mostrar['calificacion']."</td>";
                    }else{
                        echo "<td style='color:black;'>".$mostrar['calificacion']."</td>";
                    }
                    ?>
                <td><?php echo $mostrar['faltas']?></td>
            </tr>
           <?php
            }
            ?>


        </table>
    </main>
</body>
</html>
