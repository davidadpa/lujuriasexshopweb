<?php

$conxion = mysqli_connect("localhost","root","","sexshop"); // conoxion a la base de datos



$nombre_completo = $_POST['nombre_completo']; //Se toman los datos del forumario
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$query = "INSERT INTO tlb_cliente(cliente_nombre, cliente_correo, cliente_telefono, cliente_usuario, cliente_contrasena) VALUES ('$nombre_completo', '$correo', '$telefono', '$usuario', '$contrasena')";     // se crea la varible para insertar los datos en la tabla

$ejecutar = mysqli_query($conexion, $query); 



?>