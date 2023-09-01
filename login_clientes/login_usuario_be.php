<?php
session_start(); // se utiliza para trabajar con sesiones

$conexion = mysqli_connect("localhost","root","","sexshop_bd"); // conoxion a la base de datos



 //Se toman los datos del forumario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena); //se utiliza el modo sha512 para que lea la contraseña sifrada de la base de datos


$validar_login = mysqli_query($conexion, "SELECT * FROM tlb_clientes WHERE cliente_correo='$correo'and cliente_contrasena='$contrasena' ");
if(mysqli_num_rows($validar_login) >0){
    $_SESSION['usuario']= $correo;
    header("location:bienvenida.php");
}else{
    echo '
    <script>
        alert("El usiario y/o contraseña errados, por favor verifique los datos introducidos");
        window.location ="login_clientes.php"; 
    </script>
    
    ';
    exit();
}

?>