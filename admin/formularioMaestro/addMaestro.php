<?php 
//Creamos la variables de conexion
$servidor="localhost";
$usuario="proyecto";
$pass="Esima@123";
$db="proyecto";

//Verificamos los campos

if($_POST['nombre']!=""){
    $nombre=$_POST["nombre"];
}
if($_POST['apellidos']!=""){
    $apellidos=$_POST["apellidos"];
}
if($_POST['contrasena']!=""){
    $contrasena=$_POST["contrasena"];
}
if($_POST['materia']!=""){
    $materia=$_POST["materia"];
}

//Hacemos la conexion
$conexion = mysqli_connect($servidor,$usuario,$pass,$db);
if(!$conexion){
    echo "Error: No se puede conectar a la base de datos MySQL".PHP_EOL;
    echo "Errno: Errno de depuracion".mysqli_connect_errno().PHP_EOL;
    echo "Error: Error de depuracion".mysqli_connect_error().PHP_EOL;
    exit;
}
echo "La conexion a la base de datos se ha realizado correctamente".PHP_EOL;

//Guardamos el query de la insercion
$query = "INSERT INTO maestro (nombre,apellidos,materia,contrasena) VALUES ('$nombre','$apellidos','$materia','$contrasena')";
//Ejecutamos el query en el servidor
mysqli_query($conexion,$query);
mysqli_close($conexion);
//Al terminar, se redirije al menu de admins
header("Location: ../menuAdmin.html");
?>