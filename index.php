<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">

    <title>Sistema de votaciones 2021</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <?php
    session_start();
    require_once("databases/connection.php");// incrustar o vincular un archivo PHP

    //session_start();//inicio una sesion de un valor
    if(isset($_POST["tialumno"])){
        $estudiante = $_POST["tialumno"];
        echo $estudiante;

    }
    if(isset($_POST["boton"])){
        $boton = $_POST["boton"];
        echo $boton;
        switch($boton){
            case "Ingresar";
            if(empty($estudiante)){
                $vacio ="si"; // declaro variable y asigno la palabra si
                break;
            }
            $sql = "SELECT * FROM `alumnos` WHERE cedula_alumno = $estudiante";
            $resultado = mysqli_query($conn,$sql);//objeto de datos
            //echo $resultado;
            $datos = mysqli_fetch_array($resultado);//datos en posiciones ejem[1,0,2,3] este es el array de un solo registro
            echo $datos['nombre']." ". $datos['carrera'];

            $cedAlumno= $datos['cedula_alumno'];
            $nomAlumno= $datos['nombre'];
            //$carreraAlumno = $datos['carrera'];
            $votoAlumno= $datos['voto'];

            if($estudiante == $cedAlumno){//validar los datos comparacion
                $_SESSION["nombreest"] = $nomAlumno;
                $_SESSION["curso"] = $datos ["carrera"];
                $_SESSION["cedulaAlumno"] = $cedAlumno;

                if($votoAlumno==0){
                    echo"<script>window.location ='pages/menuestudiante.php'</script>";
                }else{ 
                    $acceso ="YaVoto"; 
                }

                echo "<script> window.location = 'pages/menuestudiante.php </script>";
            }
             else{
                $acceso = "denegado";
            }      
            break;

            case "Cancelar";
            break;

        }

    }
    

    ?>

<header>
        <div class="container">
            <img class="imagen" src="img/udenar.jpg">
            <div class="titulopagina">
                <h1>SISTEMA DE VOTACIONES</h1>
                <h3>2021</h3>
            </div>
            <img class="logocol" src="img/voto.png" alt="UDENAR">
        </div> 
</header>
  <hr>
<section>
<div class="container">
<form action="index.php" role="form" method="post">
  <div class="form-group">
    <label for="tialumno">Escribe tu número de tarjeta de identidad:</label>
    <input type="text" name="tialumno" class="form-control" id="alumno"
           placeholder="alumno">
  </div>

   <input type ="submit" class="btn btn-primary" name="boton" Value="Ingresar">
   <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
</form>
</section>

    <div  align="center">
        <?php
    
            if ($acceso=="denegado") {
                echo "<h1 class='alerta'>El numero: ".$estudiante." no se encuentra en el sistema </h1>";
            }
            if($acceso=="YaVoto"){
                echo "<h1 class='alerta'>Este estudiante indentificado con:  ".$estudiante." Ya realizo su voto.</h1>";
            }                
        ?>
                
    </div>

<footer>
    <p>Aunar Diseño y desarrollo WEB Copyright &copy; 2020 &aacute;</p>
    <p>Creado por: Juan Pablo Moran Maya Diseñador Industrial / WhatsApp: 300 555 1493</p>
</footer> 

    <?php
    // lenguaje de programacion
    //variables con $ debe empezar con una letra no ultiliza numeros al inicio.
    // ciclos -> for, while, do while

    $codigo = 3;
    if($codigo > 0){
        echo "Hola Mundo";  
    }
    
    ?>  
</body>
</html>