<?php
//Hacemos la conexion
$servidor="localhost";
$usuario="proyecto";
$pass="Esima@123";
$db="proyecto";

//Verificamos que los campos esten llenos
if($_POST['nombre']!=""){
    $nombre=$_POST["nombre"];
}
if($_POST['apellidos']!=""){
    $apellidos=$_POST["apellidos"];
}
if($_POST['contrasena']!=""){
    $contrasena=$_POST["contrasena"];
}
if($_POST['materia1']!=""){
    $materia1=$_POST["materia1"];
}
if($_POST['materia2']!=""){
    $materia2=$_POST["materia2"];
}
if($_POST['materia3']!=""){
    $materia3=$_POST["materia3"];
}
if($_POST['maestro1']!=""){
    $maestro1=$_POST["maestro1"];
}
if($_POST['maestro2']!=""){
    $maestro2=$_POST["maestro2"];
}
if($_POST['maestro3']!=""){
    $maestro3=$_POST["maestro3"];
}
if($_POST['grado']!=""){
    $grado=$_POST["grado"];
}
if($_POST['telefono']!=""){
    $telefono=$_POST["telefono"];
}
if($_POST['correo']!=""){
    $correo=$_POST["correo"];
} 

//Creamos las los campos faltantes para poder llenar la tabla
$calif  = 0;
$faltas = 0;
$colegiatura = 7500;
//Creamos la conexion
$conexion = mysqli_connect($servidor,$usuario,$pass,$db);
if(!$conexion){
    echo "Error: No se puede conectar a la base de datos MySQL".PHP_EOL;
    echo "Errno: Errno de depuracion".mysqli_connect_errno().PHP_EOL;
    echo "Error: Error de depuracion".mysqli_connect_error().PHP_EOL;
    exit;
}
echo "La conexion a la base de datos se ha realizado correctamente".PHP_EOL;

//Query de la insercion
$query = "INSERT INTO alumno (nombres,apellidos,grado,telefono,correo,colegiatura,contrasena) VALUES ('$nombre','$apellidos','$grado','$telefono','$correo','$colegiatura','$contrasena')";
//Mandamos la insercion al servidor
mysqli_query($conexion,$query);

$query = "SELECT * FROM alumno WHERE nombres='$nombre' AND apellidos='$apellidos' AND contrasena ='$contrasena'";
$resultado = mysqli_query($conexion,$query);
$mostrar=mysqli_fetch_array($resultado);
$id = $mostrar['id'];

$query = "INSERT INTO materia (id_alumno,clase,calificacion,faltas,id_maestro) VALUES ('$id','$materia1','$calif','$faltas','$maestro1')";
mysqli_query($conexion,$query);
$query = "INSERT INTO materia (id_alumno,clase,calificacion,faltas,id_maestro) VALUES ('$id','$materia2','$calif','$faltas','$maestro2')";
mysqli_query($conexion,$query);
$query = "INSERT INTO materia (id_alumno,clase,calificacion,faltas,id_maestro) VALUES ('$id','$materia3','$calif','$faltas','$maestro3')";
mysqli_query($conexion,$query);

//Al terminar, se redirije al menu de admins
header("Location: ../menuAdmin.html");

?>
