<?php

    session_start();
    require_once("../../databases/connection.php");//traer un archivo php de otro lado
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $vacio = isset($_POST['variable'])? $_POST['variable']: null;
    $acceso = isset($_POST['variable'])? $_POST['variable']: null;
  //print_r($_GET);
  //print_r($_POST);

 

    //condicional ternario
    /**
     * if condicional SI es una sola linea de codigo y una sola condición
     * (condicion) ? valor Verdad : Valor Falso
     * ? =
     */

    if (empty($acceso)){
         //echo "El dato es vacio";

    }
    
    if (isset($_POST["idcandidato"])){
      $idcandidato = $_POST["idcandidato"];
    }else{
      $idcandidatoo=" ";
    }
    if (isset($_POST["cedcandidato"])){
      $cedcandidato = $_POST["cedcandidato"];
    }else{
      $cedcandidatoo=" ";
    }
    if (isset($_POST["nomcandidato"])){
      $nomcandidato = $_POST["nomcandidato"];
    }else{
      $nomcandidato=" ";
    }
    if (isset($_POST['boton'])){

        $boton = $_POST["boton"];
        
        switch($boton){
            case "guardar": 

              if (isset($_POST["carrera"])){
                $carreracandidato =$_POST["carrera"];

                switch($carreracandidato){
                  case "Personero":
                    $sql="INSERT INTO candidatos (id_candidato,celula_candidato,nombre) VALUES ('$idcandidato','$cedcandidato','$nomcandidato')";
                ?>
                    <script>
                      alert('Gracias por registrar candidato');
                      //window.location="../index.php"//permite volver a un archivo index es de java script
                    </script> 
                <?php  
                break; 

                case "Contralor":
                    $sql="INSERT INTO candidatosc (id_candidatoc,celula_candidatoc,nombre) VALUES ('$idcandidato','$cedcandidato','$nomcandidato')";
                ?>    
                <script>
                    alert('Gracias por registrarte');
                    //window.location="../index.php"//permite volver a un archivo index es de java script
                </script> 
                <?php
                break;

                }
                $resultado = mysqli_query($conn, $sql);
              }         
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
    <title>Inscripcion Candidato</title>

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
            <h1 class="text-center">Modulo Registro de Candidato Estudiante</h1>
            <h3>Universidad de Nariño</h3>
        </div>
    </div>
    <hr>
</div>
</header>
<hr>
<section>
<div class="container">
<form action="cargar_candidato.php" role="form" method="post">

  <label for="Carrera">Seleccione el tipo de Candidatura: </label>

  <select name="carrera">

    <option disable="">Seleccione una opcion</option>
    <option value="Personero">Personero</option>
    <option value="Contralor">Contralor</option>
  </select>
  <div class="form-group">
    <label for="tialumno">Escribe el ide candidato:</label>
    <input type="text" name="idcandidato" class="form-control" id="alumno"
           placeholder="Ide Candidato">
  </div>
  <div class="form-group">
    <label for="tialumno">Escribe tu número de tarjeta de identidad:</label>
    <input type="text" name="cedcandidato" class="form-control" id="alumno"
           placeholder="No. Identidad">
  </div>
    <div class="form-group"> 
    <label for="tialumno">Escribe tu nombre del Candidato:</label>
    <input type="text" name="nomcandidato" class="form-control" id="alumno" placeholder="alumno">
  </div>

   <input type ="submit" class="btn btn-primary" name="boton" Value="guardar">
   <input type ="submit"  class="btn btn-danger" name="boton" Value="cancelar">
</form>
</section>
</body>
</html>

