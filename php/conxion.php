<?php
// Se crea una nueva conexión a la base de datos utilizando la clase mysqli.
// Se pasan los siguientes parámetros: 
// 1. El servidor de la base de datos (en este caso, "localhost").
// 2. El nombre de usuario para acceder a la base de datos (en este caso, "root").
// 3. La contraseña del usuario (en este caso, "Alex0411").
// 4. El nombre de la base de datos a la que se desea conectar (en este caso, "odontologia").
// 5. El puerto de conexión (en este caso, "3307").
$conexion = new mysqli("localhost", "root", "Alex0411", "odontologia", "3307");

// Se establece el conjunto de caracteres para la conexión a UTF-8.
// Esto es importante para asegurar que los datos se manejen correctamente,
// especialmente si contienen caracteres especiales o acentos.
$conexion->set_charset("utf8");
