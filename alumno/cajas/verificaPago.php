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
//Obtenemos el monto a oagar del formulario
$monto = $_POST['monto'];
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
echo "La conexion a la base de datos se ha realizado correctamente".PHP_EOL;

$query = "SELECT * FROM alumno WHERE id = '$id'";
//Ejecutamos el query
$resultado = mysqli_query($conexion,$query);
//Guadamos en un array los datos del alumno              
$mostrar=mysqli_fetch_array($resultado);  

////obtenemos el saldo de la colegiatura

$saldoActual = $mostrar['colegiatura'];

////obtenemos el nuevo saldo

$saldoNuevo = $saldoActual - $monto;


////Hacemos el update

$pago = "UPDATE alumno SET colegiatura='$saldoNuevo' WHERE id='$id'";
mysqli_query($conexion,$pago);

header("Location: ./cajas.php");
?>