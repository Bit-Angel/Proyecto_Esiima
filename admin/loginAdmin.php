<?php
//Obtenemos el usuario y contraseña ingresados
$user = $_POST['user'];
$pass = $_POST['pass'];
//Comparamos con nuestro usuario ROOT
if($user == "root" && $pass == "toor"){
    header("Location: ./menuAdmin.html");
    //Si es correcto, lo dirijimos al menu de administradores
}else{
    $error =  "Usuario o contraseña incorrectos";
    //Si no, se redirije a la misma pagina con un mensaje de error
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
</head>
<body>
    <form action="loginAdmin.php" method="post">
<!--     Se muestra el mensaje de error             -->
         <div> <?php echo $error; ?> </div>
        
        <label for="user">Ingresa tu usuario: </label>
        <input type="text" name="user" id="root"><br>
        <label for="pass">Ingresa tu contraseña</label>
        <input type="password" name="pass" id="toor"><br>
        
        <button type="submit" value="comprobar">Ingresar</button>
        
    </form>
<!-- Nota: El usuario y contraseña son los ID de los inputs -->
</body>
</html>