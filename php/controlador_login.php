<?php
// Se verifica si el botón de ingresar ha sido presionado.
// Esto se hace comprobando si el campo "btningresar" del formulario no está vacío.
if (!empty($_POST["btningresar"])) {

    // Se verifica que los campos de usuario y contraseña no estén vacíos.
    // Si ambos campos tienen valores, se procede a capturarlos.
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario = $_POST["usuario"]; // Captura el nombre de usuario ingresado.
        $password = $_POST["password"]; // Captura la contraseña ingresada.

        // Se realiza una consulta a la base de datos para verificar las credenciales del usuario.
        // Se seleccionan todos los registros de la tabla 'usuarios' donde el nombre de usuario y la contraseña coinciden.
        $sql = $conexion->query("SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$password'");

        // Se verifica si se obtuvo algún resultado de la consulta.
        // Si se encuentra un registro, se considera que las credenciales son correctas.
        if ($datos = $sql->fetch_object()) {
            // Si las credenciales son válidas, se redirige al usuario a la página de inicio.
            header("location: inicio.php");
        } else {
            // Si no se encuentra un registro, se muestra un mensaje de acceso denegado.
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
    } else {
        // Si alguno de los campos está vacío, se muestra un mensaje pidiendo que se completen todos los campos.
        echo "Los campos están vacíos, por favor rellene todos los campos para continuar";
    }
}
