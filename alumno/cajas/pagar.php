

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
$query = "SELECT * FROM alumno WHERE id = '$id'";
//Ejecutamos el query
$resultado = mysqli_query($conexion,$query);
//Guadamos en un array los datos del alumno
$mostrar=mysqli_fetch_array($resultado);

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <link rel="stylesheet" href="./pago_cole.css">
</head>
<body>
    <div class="header">
            <div class="logo">
                <img class="logo-img" src="../images/logoesiima.jpg" alt="logo-esiima">
            </div>
            <div class="links">
                <a href=".././Vista-Al.php" class="header-txt">INICIO</a>
                <a href=".././controlEscolar/menuControl.php" class="header-txt">CONTROL ESCOLAR</a>
                <a href="./cajas.php" class="header-txt">CAJAS</a>
                <a href="../../index.html" class="header-txt Salir"><p>SALIR</p></a>
            </div>
    </div>
    <div class="cuerpo">
        <div class="saldo">
            <h2>SALDO ACTUAL: $ <?php echo $mostrar['colegiatura']?>.00</h2>
            <label>PAGUESE ANTES DE: 31/12/21</label>
        </div>
        <form action="verificaPago.php" method="post">
            <div class="label">
                <label for="tarjeta">TARJETA</label>
            </div>
            <input type="number" required placeholder="XXXX XXXX XXXX XXXX">
            <div class="label">
                <label for="tarjeta">FECHA DE VENCIMIENTO</label>
            </div>
            <input class="fecha" type="number" required placeholder="MM">
            <input class="fecha" type="number" required placeholder="AA">
            <div class="label">
                <label for="tarjeta">NIP</label>
            </div>
            <input type="number" required placeholder="XXX">
            <div class="label">
                <label for="monto">Monto a pagar</label>
            </div>
            <input type="number" name="monto" required placeholder="$">
            <div class="boton">
                <button style="submit">PAGAR</button>
            </div>
        </form>
    </div>
</body>
</html>
