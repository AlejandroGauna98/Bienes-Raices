<?php
//Conexion a la DB
require 'includes/config/database.php';
$db = conectarDB();

//Crear los datos para insertar en la tabla de usuarios     
$email = "correo@correo.com";
$password = "123456";

//Consulta
$query = "INSERT INTO usuarios (email,password) VALUES ( '${email}' , '${password}' )";

//Resultado
mysqli_query($db,$query);

?>