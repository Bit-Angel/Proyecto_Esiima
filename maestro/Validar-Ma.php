<?php
    //Validamos que el usuario y contraseña sean las correctas
    $usuario=$_POST['usuario-btn'];
    $contrasena=$_POST['password-btn'];
    
    //Iniciamos usa session
    session_name("usuario");
    session_start();
    $_SESSION['usuario-btn']=$usuario;
    $varsesion=$_SESSION['usuario-btn'];

    if($varsesion==null || $varsesion=""){
        echo "No tienes autorizacio";
        die();
    }
    
    //Conexion a la base de datos
    $conexion=mysqli_connect("localhost","proyecto","Esima@123","proyecto");
    if($conexion){
        echo "Conexion estable";
    }else{
        echo "fallo de db";
        echo "Error: No se puede conectar a la base de datos Mysql".PHP_EOL; 
        echo "Error No: Error de depuracion ".mysqli_connect_errno().PHP_EOL;
        echo "Error: error de depuracion ".mysqli_connect_error().PHP_EOL;
    }
    //Consultamos los datos
    $consulta="SELECT * FROM maestro WHERE id='$usuario' and contrasena='$contrasena'";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_num_rows($resultado);

    if($filas){
        //Si el usuario es correcto accede a la vista del alumno
        $_SESSION["autentificado"]= "SI";
        $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
        header("location:Vista-Al.php");
    }else{
        //Si no es correcto redirecciona al login
        header("location:Log-Ma.html");
    }

     
    mysqli_free_result($resultado);
    mysqli_close($conexion);

?>