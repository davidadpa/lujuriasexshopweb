<?php

session_start();// se utiliza para trabajar con sesiones
$conexion = mysqli_connect("localhost","root","","sexshop_bd"); // conoxion a la base de datos

//Se toman los datos del forumario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];


$validar_login = mysqli_query($conexion, "SELECT * FROM tlb_usuario_admin WHERE usuario_admin='$usuario'and usuario_admin_contrasena='$contrasena' ");
if(mysqli_num_rows($validar_login) >0){
    $_SESSION['usuario']= $usuario;
    header("location:../inicio.php");
}else{
    echo '
    <script>
        alert("El usiario y/o contraseña errados, por favor verifique los datos introducidos");
        window.location ="../index_admin.php"; 
    </script>
    
    ';
    exit();
}

?>