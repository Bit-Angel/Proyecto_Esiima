<?php
//Variables de usuario
$servidor="localhost";
$usuario="proyecto";
$pass="Esima@123";
$db="proyecto";
//Creamos la conexion
$conexion = mysqli_connect($servidor,$usuario,$pass,$db);
if(!$conexion){
    echo "Error: No se puede conectar a la base de datos MySQL".PHP_EOL;
    echo "Errno: Errno de depuracion".mysqli_connect_errno().PHP_EOL;
    echo "Error: Error de depuracion".mysqli_connect_error().PHP_EOL;
    exit;
}
//          Recorrer una tabla
//    $query = "SELECT * FROM maestros";
//    $resultado = mysqli_query($conexion,$query);
//
//    while($mostrar=mysqli_fetch_array($resultado)){
//        echo $mostrar['nombre'];
//    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Añadir Alumno</title>
    <link rel="stylesheet" href="Alumno.css">
</head>
<body>
        <form action="addAlumno.php" method="post">

        <div class="header">
			<div class="logo">
				<a href="../../index.html"><img class="logo-img" src="./imagenes/logoesiima.jpg" alt="logo-esiima"></a>
			</div>
			<div class="links">
				<a href="../menuAdmin.html" class="header-txt">INICIO</a>
				<a href="#" class="header-txt">ALTA ALUMNOS</a>
				<a href="../formularioMaestro/formularioMaestro.html" class="header-txt">ALTA MAESTROS</a>
				<a href="../../index.html" class="header-txt Salir"><p>SALIR</p></a>
			</div>
		</div>

       <label class="titulo" for="titulo">ALTA ALUMNO</label><br>

   <main class="main">
       <div class="D1">
        <label class="datos" for="nombre">Nombres: </label><br>
        <input type="text" name="nombre"><br>
        <label class="datos" for="apellidos">Apellidos:</label><br>
        <input type="text" name="apellidos"><br>
        <label class="datos" for="contrasena">Contraseña:</label><br>
        <input type="text" name="contrasena"><br>
        
      </div>
      <div class="D2">
        <label class="mm" for="materia1">Primer Materia:</label>
         <select name="materia1" >
                           <option class="intomat">Materia </option>
                           <option class="intomat" value="Programacion Web">Programacion Web</option>
                           <option class="intomat" value="Base de Datos">Base de Datos</option>
                           <option class="intomat" value="Ecuaciones Diferenciales">Ecuaciones Diferenciales</option>
                           <option class="intomat" value="Redes">Redes</option>
                           <option class="intomat" value="Circuitos Electricos">Circuitos Electricos</option>
                           <option class="intomat" value="Etica Profesional">Etica Profesional</option>
        </select><br>

        <!--        Seleccionamos un maestro existente en la base de datos  -->
          <label class="maestro" for="maestro1">Maestro:</label>
          <select class="ema" name="maestro1" >
           <option class="intomaes" value="">Maestro</option>

            <?php /*Inicio php*/

                /*Hacemos un SElECT de toda la tabla*/
                $query = "SELECT * FROM maestro";
                /*Se guarda en la variable resultado*/
                $resultado = mysqli_query($conexion,$query);

                // While que recorre todas las filas de una tabla
                while($mostrar=mysqli_fetch_array($resultado)){  /*Inicio while*/

             ?> <!--Final php-->

           <!-- El value es el mismo nombre de maestro            Se genera una opcion por cada nombre de maestro en la tabla-->
                <option value="<?php echo $mostrar['id']; ?>"> <?php echo $mostrar['nombre']; ?> </option>

            <?php /*Inicio php*/

                } /*Final while*/

              ?>  <!--Final php-->
        </select><br>

         <label class="mm" for="materia2">Segunda Materia:</label>
         <select name="materia2" >
                           <option class="intomat">Materia </option>
                           <option class="intomat" value="Programacion Web">Programacion Web</option>
                           <option class="intomat" value="Base de Datos">Base de Datos</option>
                           <option class="intomat" value="Ecuaciones Diferenciales">Ecuaciones Diferenciales</option>
                           <option class="intomat" value="Redes">Redes</option>
                           <option class="intomat" value="Circuitos Electricos">Circuitos Electricos</option>
                           <option class="intomat" value="Etica Profesional">Etica Profesional</option>
        </select><br>

        <!--        Seleccionamos un maestro existente en la base de datos  -->
        <label class="maestro" for="maestro2">Maestro:</label>

          <select class="ema" name="maestro2" >
           <option class="intomaes" value="">Maestro</option>

            <?php /*Inicio php*/

                /*Hacemos un SElECT de toda la tabla*/
                $query = "SELECT * FROM maestro";
                /*Se guarda en la variable resultado*/
                $resultado = mysqli_query($conexion,$query);

                // While que recorre todas las filas de una tabla
                while($mostrar=mysqli_fetch_array($resultado)){  /*Inicio while*/

             ?> <!--Final php-->

           <!-- El value es el mismo nombre de maestro            Se genera una opcion por cada nombre de maestro en la tabla-->
                <option value="<?php echo $mostrar['id']; ?>"> <?php echo $mostrar['nombre']; ?> </option>

            <?php /*Inicio php*/

                } /*Final while*/

              ?>  <!--Final php-->
        </select><br>
         <label class="mm" for="materia3">Tercer Materia:</label>
         <select name="materia3" >
                           <option class="intomat">Materia </option>
                           <option class="intomat" value="Programacion Web">Programacion Web</option>
                           <option class="intomat" value="Base de Datos">Base de Datos</option>
                           <option class="intomat" value="Ecuaciones Diferenciales">Ecuaciones Diferenciales</option>
                           <option class="intomat" value="Redes">Redes</option>
                           <option class="intomat" value="Circuitos Electricos">Circuitos Electricos</option>
                           <option class="intomat" value="Etica Profesional">Etica Profesional</option>
        </select><br>

<!--        Seleccionamos un maestro existente en la base de datos  -->
        <label class="maestro" for="maestro3">Maestro:</label>

          <select class="ema" name="maestro3" >
           <option class="intomaes" value="">Maestro</option>

            <?php /*Inicio php*/

                /*Hacemos un SElECT de toda la tabla*/
                $query = "SELECT * FROM maestro";
                /*Se guarda en la variable resultado*/
                $resultado = mysqli_query($conexion,$query);

                // While que recorre todas las filas de una tabla
                while($mostrar=mysqli_fetch_array($resultado)){  /*Inicio while*/

             ?> <!--Final php-->

           <!-- El value es el mismo nombre de maestro            Se genera una opcion por cada nombre de maestro en la tabla-->
                <option value="<?php echo $mostrar['id']; ?>"> <?php echo $mostrar['nombre']; ?> </option>

            <?php /*Inicio php*/

                } /*Final while*/

              ?>  <!--Final php-->
        </select><br>
          
        </div>
        <div class="D3">
            <label class="datos" for="grado">Grado:</label><br>
            <input type="number" name="grado"><br>   
            <label class="datos" for="telefono">Telefono:</label><br>
            <input type="text" name="telefono"><br>   
            <label class="datos" for="correo">Correo:</label><br>
            <input type="text" name="correo"><br> 
        </div>
        
            
        <button class="enviar" type="submit" value="comprobar">Enviar Datos</button>
        <button class="borrar" type="reset"  value="borrar">Borrar</button>
    </main>
    </form>
</body>
</html>
