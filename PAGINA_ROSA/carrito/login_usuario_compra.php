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
$SID=session_id(); //devuelve una clave de la session carrito
$correo=$_POST['correo'];
foreach($_SESSION['CARRITO'] as $indice=>$producto){
    $total=$total+($producto['precio']*$producto['cantidad']);

     }

     $sentencia=$conexion->prepare("INSERT INTO `tlb_ventas` 
     (`venta_id`, `venta_clavetransaccion`, `venta_paypaldatos`, `venta_fecha`, `venta_correo`, `venta_total`, `venta_status`) 
     VALUES (NULL, :venta_clavetransaccion, '', NOW(), :venta_correo, :venta_total, 'pendiente');");


     $sentencia->bindParam(":venta_clavetransaccion", $SID);
     $sentencia->bindParam(":venta_correo", $correo);
     $sentencia->bindParam(":venta_total", $total);
     $sentencia->execute();
     $idventa=$conexion->lastInsertId();


     foreach($_SESSION['CARRITO'] as $indice=>$producto){
     
    $sentencia=$conexion->prepare("INSERT INTO 
    `tlb_detalle_ventas` (`detalle_venta_id`, `detalle_idventa`, `detalle_id_producto`, `detalle_precio_unitario`, `detalle_cantidad`, `detalle_descargado`) 
    VALUES (NULL, :detalle_idventa, :detalle_id_producto, :detalle_precio_unitario, :detalle_cantidad, '0');");

    $sentencia->bindParam("detalle_idventa", $idventa);
    $sentencia->bindParam("detalle_id_producto",$producto['id'] ); // este id viene del carrito.php
    $sentencia->bindParam(":detalle_precio_unitario", $producto['precio']);
    $sentencia->bindParam(":detalle_cantidad", $producto['cantidad']);
    $sentencia->execute();


    }

    }
?>

 <!-- de aqui en adelante esta todo el codigo de paypal -->
 <script src="https://www.paypalobjects.com/api/checkout.js"></script>  <!--conexion con el archivo js de paypal -->

<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar con paypal la cantidad de: 
        <h4>$<?php echo number_format($total,2);?></h4>
        <div id="paypal-button-container"></div>
    </p>
    <p>Los productos se enviaran una vez se procese el pago<br>
    <strong>(Para aclaraciones escribir a: lujuriasexshop@hotmail.com)</strong>
    </p>
    <br>
    <p>Nota: el usiario de paypal es sb-tlsfe26820375@personal.example.com</p>
    <p>Nota: la contraseña de paypal es sexshop123</p>
</div>


<script>

    // Render the PayPal button

    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            label: 'buynow',
            fundingicons: true, // optional
            branding: true, // optional
            size:  'small', // small | medium | large | responsive
            shape: 'rect',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AbX44e-8ZWrGeygDCEJoEsL8FzFeXJmaeP7hqrSoPHh7nYKqWQN2IwdwPfNNZsPb16SyZnBC0xdvbAWm',
            production: '<insert production client id>'
        },

        // Show the buyer a 'Pay Now' button in the checkout flow
        commit: true,

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [
                    {
                        amount: { total: '<?php echo number_format($total,2);?>', currency: 'USD' },
                        description:"Compra de productos a Lujuria Sexshop:$<?php echo number_format($total,2);?>",
                        custom:"<?php echo $SID;?>#<?php echo openssl_encrypt($idventa,COD,KEY);?>" //retorno de informacion de paypal para confirmar la compra
                    }
                ]
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
               // window.alert('Payment Complete!');
            });
        }

    }, '#paypal-button-container');

</script>
    


<?php include("../template/pie_carrito.php"); ?> <!--Corresponde al pie de pagina-->