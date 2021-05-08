<?php

    session_start();
    $nomEstudiante = $_SESSION["nombreest"];
    $cursoEstudiante = $_SESSION["curso"];
    $cedulaAlumno = $_SESSION["cedulaAlumno"];
    //echo "Bienvenido estudiante:   ".$nomEstudiante."  del curso:  ".$cursoEstudiante;

    //echo"Bienvenido estudiante";

    require_once("../databases/connection.php");//traer un archivo php de otro lado

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
    if (isset($_POST["candidato"])){
        $codigofcandidato =$_POST["candidato"];//si algo llega por el metodo post nombre candidato lo reciba lo qw se introdujo
    }else{
        $codigofcandidato=" ";
    }
    if (isset($_POST["candidatoc"])){
        $codigofcandidatoc = $_POST["candidatoc"];
    }else{
        $codigofcandidatoc=" ";
    }
    if (isset($_POST['boton'])){

        $boton = $_POST["boton"];
        
        switch($boton){
            case "votar": 
                $sql="UPDATE alumnos SET voto = '0' , cod_candidato='$codigofcandidato', cod_candidatoc ='$codigofcandidatoc' WHERE cedula_alumno='$cedulaAlumno'";
                $resultado = mysqli_query($conn, $sql);
                ?>
                <script>
                    alert('Gracias por votar');
                    window.location="../index.php"//permite volver a un archivo index es de java script
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">
    <title>Seleccion candidatos estudiante</title>
    <link rel="stylesheet" href="../css/stylemenu.css">
</head>

<body>
<!--<header>
            <div class="container">
            <img class="logocol" src="../img/udenar.jpg" alt="UDENAR">
                <div class="titulopagina">
                    <h1>SISTEMA DE VOTACIONES 2021</h1>
                    <h3>Universidad de Nariño</h3>
                </div>
                <div>
                    <h4><?php echo $nomEstudiante ?> </h4>
                </div>         
            <h3 class="usuario"><i class="fas fa-user-edit"></i> </i></h3>  
            </div> 
</header>-->
<header>
<div class="container-fluid">
    <div class="container">
        <img class="logocol" src="../img/udenar.jpg" alt="UDENAR">
        <div class="titulopagina">
            <h1 class="text-center">Sistema de Votaciones</h1>
            <h3>Universidad de Nariño</h3>
        </div>
        <div>
            <h4> <?php echo $nomEstudiante ?> </h4>
        </div>
        <h3 class="usuario"><i class="fas fa-user-edit"></i> </i></h3> 
    </div>
    <hr>
</div>
</header>
<div class="container">
    <div class="center-block col-md-12 col-xs-8">
        <?php echo "Bienvenido estudiante: ".$nomEstudiante." del curso: ".$cursoEstudiante; ?>
    </div>
    <form name="acceso" action ="menuestudiante.php" role="form" method="POST">
        <div class="md-12">
            <fieldset>
                <legend><em><strong>Candidatos a personero </strong></em></legend>
                <?php  
                $sql="SELECT * FROM candidatos";
                $resultado = mysqli_query($conn, $sql);
                $num_reg = mysqli_num_rows($resultado);// se usa cuando usas select
                ?>
                <table border="1">
                    <tr>
                        <?php 
                            for ($i=0; $i<$num_reg; $i++){
                                $candidato = mysqli_fetch_array($resultado);
                                $codcandidato = $candidato["cod_candidato"];
                                $nomcandidato = $candidato["nombre"];                        
                        ?>
                    <td bgcolor="#c4e567"> <!--celdas-->
                            <img src="../img/candidatos/<?php echo $codcandidato.".png"?>" alt="<?php echo $nomcandidato ?>" width="220px" height="210px">
                            <input type="radio" name="candidato" value="<?php echo $codcandidato ?>"> <br>
                            <b>(<?php echo "0".$codcandidato ?>) <?php echo $nomcandidato ?>)</b>
                    </td>
                        <?php
                            }
                        ?>                       
                    </tr>                   
                </table>
            </fieldset><br>
        </div>    
        <div class="md-12"> 
            <fieldset>
                <legend><em><strong>Candidatos a contralor </strong></em></legend>
                <?php  
                $sql="SELECT * FROM candidatosc";
                $resultado = mysqli_query($conn, $sql);
                $num_reg = mysqli_num_rows($resultado);// se usa cuando usas select
                ?>
                <table  border="1">
                    <tr>
                        <?php 
                            for ($i=0; $i<$num_reg; $i++){
                                $candidatoc = mysqli_fetch_array($resultado);
                                $codcandidatoc = $candidatoc["cod_candidatoc"];
                                $nomcandidatoc = $candidatoc["nombre"]; 
                                                   
                        ?>
                    
                    <td bgcolor="#c4e567"> <!--celdas-->
                            <img src="../img/contralor/<?php echo $codcandidatoc.".png"?>" alt="<?php echo $nomcandidatoc ?>" width="220px" height="210px">
                            <input type="radio" name="candidatoc" value="<?php echo $codcandidatoc ?>"> <br>
                            <b>(<?php echo "0".$codcandidatoc ?>) <?php echo $nomcandidatoc ?>)</b>
                    </td>
                    <?php
                        }
                    ?>
                    </tr>
                </table>                  
            </fieldset>
                      
        </div>
        <br><br>
            <input type="submit" class="btn btn-primary" name="boton" value="votar">
            <input type="submit" class="btn btn-danger" name="boton" value="cancelar"> 
    </form>
</div>


 <!--   <hr>
    <section id="cajas">
    <div class="container">
        <div class="container1">
            <h2>Selecciona tu candidato para personero</h2>
            <div class="cajap">
            <div class="caja" id="item1">
                <img src="../img/foto.png" alt="alumno">
                <h2>Candidato 1</h2>
            </div>
            <div class="caja" id="item2">
                <img src="../img/foto.png" alt="alumno">
                <h2>Candidato 2</h2>
            </div>
            <div class="caja" id="item3">
                <img src="../img/foto.png" alt="alumno">
                <h2>Candidato 3</h2>
            </div>
            </div>           
        </div>
        
        <div class="container2">
        <h2>Selecciona tu contador para personero</h2>
        <div class="cajap">
        <div class="caja" id="item1">
                    <img src="../img/foto.png" alt="alumno">
                    <h2>Candidato 1</h2>
            </div>
            <div class="caja" id="item1">
                    <img src="../img/foto.png" alt="alumno">
                    <h2>Candidato 2</h2>
            </div>
        </div>
            
        </div>            
    </div>

    </section>-->

<footer>
    <p>Aunar Diseño y desarrollo WEB Copyright &copy; 2020 &aacute;</p>
    <p>Creado por: Juan Pablo Moran Maya Diseñador Industrial / WhatsApp: 300 555 1493</p>
</footer> 
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>  
</body>
</html>