<?php
if(!empty($_POST["btningresar"])){
    if (!empty($_POST["usuario"])and !empty($_POST["password"])) {
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conexion->query(" select * from usuarios where usuario='$usuario' and contrasena='$password'");
        if ($datos=$sql->fetch_object()) {
            header("location: inicio.php");
        } else {
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
        
    } else {
        echo "Los campos estan vacios, por favor rellene todos los campos para continuar";
    }
    
}
?>