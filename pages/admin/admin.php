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
    <title>Administracion del Sistema de Votacione</title>
    <link rel="stylesheet" href="../../css/alumno.css">
</head>
<body>
<?php
require_once("../../databases/connection.php");
$vacio = isset($_POST['variable'])? $_POST['variable']: null;
$acceso = isset($_POST['variable'])? $_POST['variable']: null;

session_start();
if(empty($acceso)){
    //echo "El acceso es denegado";
}
if(isset($_POST['usuario'])){
    $verusuario = $_POST['usuario'];
}
if(isset($_POST['clave'])){
    $verclave = $_POST['clave'];
}

if(isset($_POST['acceder'])){
    if(empty($usuario) && empty($verclave)){
        $vacio = true;
    }
    else {
        $sql = "SELECT * FROM usuarios WHERE usuario='$verusuario' and clave='$verclave'";
        $resultado = mysqli_query($conn,$sql);
        $datos = mysqli_fetch_array($resultado);
        $BDusuario = $datos['usuario'];
        $BDclave = $datos['clave'];

        if(isset($BDusuario) && isset($BDclave)){
            echo $BDusuario."  ".$BDclave;
            echo "Si accede correctamente";
            $acceso = true;

        }
        else{
            $acceso = false;
        }

        
    }


}
?>
<header>
    <div class="container-fluid">
    <div class="container">
        <img class="logocol" src="../../img/udenar.jpg" alt="UDENAR">
        <div class="titulopagina">
        <h1 class="text-center">Sistema de Votación</h1>
        <h3>Universidad de Nariño</h3>
        </div>
    </div>
    
    <hr>
</header>
<section>
    </div>
    <div class="container">
        <div class="center-block col-md-4 col-xs-8">
            <form action="admin.php" role="form" method="post">
            <div class="form-group">
                <label for="Usuario">Usuario</label>
                <input type="text" name="usuario" class="form-control" id="usuario"
                    placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="ejemplo_password_1">Contraseña</label>
                <input type="password" name="clave" class="form-control" id="ejemplo_password_1" 
                    placeholder="Contraseña">
            </div>


            <input type ="submit" class="btn btn-primary" name="acceder" Value="Ingresar">
            <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
            </form>
        </div>
    </div>
    <div aling="center">
        <?php 
            if($vacio){
                echo "<h1>los campos estan vacios..... Porfavor llenar usuario y contraseña</h1>";
            }
            if($acceso){
                echo"<script>alert('bienvenido al Sistema'); window.location='menuadmin.php';</script>";
                               
            }
            else{
                echo "<h1>Acceso denagado... Usuario y contraseña erronea...</h1>";
            }
        ?>
    </div>
</section>   
</body>
</html>