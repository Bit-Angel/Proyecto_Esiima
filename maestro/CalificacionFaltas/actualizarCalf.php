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
             header("Location: Log-Ma.php"); //envío al usuario a la pag. de autenticación
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
$query = "SELECT * FROM maestro WHERE id = '$id'";
//Ejecutamos el query
$maestro = mysqli_query($conexion,$query);

$materia=mysqli_fetch_array($maestro);
$nMateria=$materia['materia']; 
$query = "SELECT * FROM materia WHERE id_maestro='$id'"; 
//Ejecutamos el query
$resultado = mysqli_query($conexion,$query); 
$i=1;
while($mostrar=mysqli_fetch_array($resultado)){
    
        $aux =$mostrar['clase'];
        $idAl =$mostrar['id_alumno'];
        $name=$mostrar['id_alumno'].$aux[0];
        
        $calif = $_POST["$name"];
        $faltas = $_POST["$i"];
        
        $query = "UPDATE materia SET calificacion = '$calif' WHERE id_alumno = '$idAl' AND  id_maestro='$id' AND clase = '$aux'";
        
        mysqli_query($conexion,$query);
        $query = "UPDATE materia SET faltas = '$faltas' WHERE id_alumno = '$idAl' AND  id_maestro='$id' AND clase = '$aux'";
        
        $i=$i+1;
        mysqli_query($conexion,$query);
    
    
}
header("Location: ../Vista-Al.php");
?>