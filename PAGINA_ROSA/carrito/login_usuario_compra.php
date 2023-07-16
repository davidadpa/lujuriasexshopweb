<?php


$conexion = mysqli_connect("localhost","root","","sexshop_bd"); // conoxion a la base de datos



 //Se toman los datos del forumario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena); //se utiliza el modo sha512 para que lea la contraseña sifrada de la base de datos


$validar_login = mysqli_query($conexion, "SELECT * FROM tlb_clientes WHERE cliente_correo='$correo'and cliente_contrasena='$contrasena' ");
if(mysqli_num_rows($validar_login) >0){
    $_SESSION['usuario']= $correo;
    header("");
}else{
    echo '
    <script>
        alert("El usiario y/o contraseña errados, por favor verifique los datos introducidos");
        window.location ="../carrito/mostrar_carrito.php"; 
    </script>
    
    ';
    exit();
}

?>


<?php
require("../config/config.php");
include("../administrador/config/db.php"); 
include("carrito.php"); 
include("../template/cabecera_carrito.php");
?>


<?php
if($_POST){
$total=0;
foreach($_SESSION['CARRITO'] as $indice=>$producto){
    $total=$total+($producto['precio']*$producto['cantidad']);

     }
     echo "<h3>".$total."<h3>";
    }
?>



<?php include("../template/pie_carrito.php"); ?> <!--Corresponde al pie de pagina-->