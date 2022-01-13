<!DOCTYPE html>
<?php
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
$query = "SELECT * FROM maestro WHERE nombre = 'root'";
$admin = mysqli_query($conexion,$query);
$datos = mysqli_fetch_array($admin);
$aux = $datos['contrasena'];
if($aux==0){
    $query="UPDATE maestro SET contrasena = 1 WHERE nombre = 'root'";
}else{
    $query="UPDATE maestro SET contrasena = 0 WHERE nombre = 'root'";

}

//Ejecutamos el query
mysqli_query($conexion,$query);

header("Location: ./menuAdmin.html");
?>
