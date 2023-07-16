
<?php include("../template/cabecera_carrito.php"); ?> <!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->





<?php
require("../config/config.php");
include("../administrador/config/db.php"); 
include("carrito.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>
<div class="Titulo3">
  <h2>Lista del carrito</h2>
</div>  
<div class="tabla">
    
    <?php if(!empty($_SESSION['CARRITO'])) { ?>
    <table class="table table-light table-bordered" >
      <tbody>
        <tr>
          <th width="40%">Descripcion</th>
          <th width="15%" class="text-center">Cantidad</th>
          <th width="20%"class="text-center">Precio</th>
          <th width="20%"class="text-center">Total</th>
          <th width="5%">--</th>
        </tr>

        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?> <!--busca todos los elementos almacenadoe en $_SESSION['CARRITO'] -->
        <tr>
          <td width="40%"><?php echo $producto['nombre'];?></td>
          <td width="15%" class="text-center"><?php echo $producto['cantidad'];?></td>
          <td width="20%" class="text-center"><?php echo $producto['precio'];?></td>
          <td width="20%" class="text-center"><?php echo number_format($producto['precio']*$producto['cantidad'],2) ;?></th> <!--operacion de cantidad x precio -->
          <td width="5%">
            
            <form action="" method="post">
              <input type="hidden" name="id" id="id"value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
              <button class="btn btn-danger" type="submit" name="btnAccion" value="eliminar">Eliminar</button> <!-- se utiliza para borrar la informacion del producto-->
            </form>
          </td>
        </tr>
        <?php $total=$total+($producto['precio']*$producto['cantidad']); ?>
        <?php  } ?>
        <tr>
          <td colspan="3" align="right">Total</td>
          <td align="right"><h3><?php echo number_format($total,2);?></h3></td>
          <td width="20%"class="text-center"></td>
        </tr>

        <tr>

          <td colspan="5">

            <form action="login_usuario_compra.php" method="post">
              <div class="alert alert-success" role="alert">
                <div class="form-group">
                  <label for="my-input">Correo electronico</label>
                  <input id="correo" name="correo" class="form-control" type="email" placeholder="Por favor escribe tu correo" required>

                  <label for="my-input">Contraseña</label>
                  <input id="contrasena" name="contrasena" class="form-control" type="contrasena" placeholder="Por favor escribe tu contraseña" required>

                </div>
                <small id="emailHelp" class="form-text text-muted">para comprar tienes que tener una cuenta activa o <a href="../login_clientes/login_clientes.php">crear una</a></small>
              </div>
              <button class="btn btn-primary btn-lg btn-block" type="submit" value="proceder" name="btnAccion">Proceder a pagar >></button>
            </form>
          </td>
        </tr>



      </tbody>
    </table>
    <?php  }else{ ?>
      <div.<div class="alert alert-success">
        <br>
      No hay productos en el carrito....
      <br>
      </div>

      <?php }?>
    </div>
<script>
      $(function () {
        $('[data-toggle="popover"]').popover()
      });

    </script>


<?php include("../template/pie_carrito.php"); ?> <!--Corresponde al pie de pagina-->