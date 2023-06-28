<?php include("../template/cabecera.php") ?>

<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "../index_admin.php";
    </script>
    ';
    
    session_destroy();
    die();// don die no deja ejecutar el codigo de abajo si no tiene usuario registrado 
}
?>

<?php
include("../config/db.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>

<br>
<?php foreach($lista_producto as $producto){?>

  <div align="center">  
    <div class="col-md-6" >
      <div class="card"> 
        <img class="card-img-top" src="../../img/<?php echo $producto['producto_imagen'];?>" alt="">
        <div class="card-body">
          <h4 class="card-title"> <?php echo $producto['producto_nombre']?></h4>
          <a name="" id="" class="btn btn-primary" href="" role="button"> ver mas </a>
        </div>
      </div>
      <br>
    </div>
<?php }?>
  </div>









<?php include("../template/pie.php") ?>