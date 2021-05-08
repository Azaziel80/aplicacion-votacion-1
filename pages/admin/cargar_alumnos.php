<?php

    session_start();
    require_once("../../databases/connection.php");//traer un archivo php de otro lado

    $vacio = isset($_POST['variable'])? $_POST['variable']: null;
    $acceso = isset($_POST['variable'])? $_POST['variable']: null;

    //condicional ternario
    /**
     * if condicional SI es una sola linea de codigo y una sola condición
     * (condicion) ? valor Verdad : Valor Falso
     * ? =
     */

    if (empty($acceso)){
         //echo "El dato es vacio";

    }
    if (isset($_POST["carrera"])){
        $carreralumno =$_POST["carrera"];
    }else{
       $carreralumno=" ";
    }
    if (isset($_POST["idalumno"])){
      $codigofcedalumno = $_POST["idalumno"];
    }else{
      $codigofcedalumno=" ";
    }
    if (isset($_POST["nomalumno"])){
      $nomalumno = $_POST["nomalumno"];
    }else{
      $nomalumno=" ";
    }
    if (isset($_POST['boton'])){

        $boton = $_POST["boton"];
        
        switch($boton){
            case "guardar": 
                $sql="INSERT INTO alumnos (id_alumno,cedula_alumno,nombre,carrera,cod_candidato,cod_candidatoc, voto) VALUES (null,'$codigofcedalumno','$nomalumno','$carreralumno',0,0,0)";
                $resultado = mysqli_query($conn, $sql);
                ?>
                <script>
                    alert('Gracias por registrarte');
                    //window.location="../index.php"//permite volver a un archivo index es de java script
                </script> 
                <?php          
            break; 
            case "cancelar":
                echo "<script> alert ('Usted no ha votado , vuelva luego');
                window.location='../index.php';
                </script>";
            break;
        }

    }
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Alumno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../css/alumno.css">
</head>
<body>


<header>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar" id="defaultNavbar1">
    <div class="menu1 col-md-12 col-md-offset-8">
      <ul class="nav">
        <li class="active">
        <li><a href="cargar_alumnos.php">Cargar  Alumnos</a></li>
        <li><a href="cargar_candidato.php">Cargar candidato</a></li>
        <li><a href="resultados.php">Resultados</a></li>
        <li><a href="/index.php">Votación</a></li>  
      </ul>

  </div>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
    <div class="container">
        <img class="logocol" src="../../img/udenar.jpg" alt="UDENAR">
        <div class="titulopagina">
            <h1 class="text-center">Modulo Registro de Estudiante</h1>
            <h3>Universidad de Nariño</h3>
        </div>
    </div>
    <hr>
</div>
</header>
<hr>
<section>
<div class="container">
<form action="cargar_alumnos.php" role="form" method="post">

  <label for="Carrera">Seleccione el Curso de Estudiante: </label>
    <?php  
                  $sql="SELECT * FROM alumnos";
                  $resultado = mysqli_query($conn, $sql);
    ?>
  <select name="carrera">
    
    <option disable="">Seleccione una opcion</option>
    <option value="Primero">Primero</option>
    <option value="Segundo">Segundo</option>
    <option value="Tercero">Tercero</option>
    <option value="Cuarto">Cuarto</option>
    <option value="Quinto">Quinto</option>
    <option value="Sexto">Sexto</option>
  </select>
      
  <div class="form-group">
    <label for="tialumno">Escribe tu número de tarjeta de identidad:</label>
    <input type="text" name="idalumno" class="form-control" id="alumno"
           placeholder="No. Identidad">
  </div>
    <div class="form-group"> 
    <label for="tialumno">Escribe tu nombre del Alumno:</label>
    <input type="text" name="nomalumno" class="form-control" id="alumno" placeholder="alumno">
  </div>


   <input type ="submit" class="btn btn-primary" name="boton" Value="guardar">
   <input type ="submit"  class="btn btn-danger" name="boton" Value="cancelar">
</form>
</section>

    
</body>
</html>