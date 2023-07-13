<?php

session_start(); //para guardar informacion en la session

$mensaje="";

if(isset($_POST['btnAccion'])){

     switch($_POST['btnAccion']){ //trae la informacion del boton agregar carrito que tiene el nombre de variable btnAccion
        case 'Agregar':

            if(is_numeric(openssl_decrypt($_POST['id'],COD, KEY))){
                $ID=openssl_decrypt($_POST['id'],COD, KEY);
                $mensaje="OK ID correcto".$ID;
            }else{ $mensaje.="upp...ID incorrecto".$ID."</br>"; }


            if(is_string(openssl_decrypt($_POST['nombre'],COD, KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD, KEY);
                $mensaje="OK nombre correcto".$NOMBRE;
            }else{ $mensaje.="upp...nombre incorrecto"."</br>"; break;}

            if(is_numeric(openssl_decrypt($_POST['precio'],COD, KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD, KEY);
                $mensaje="OK precio correcto".$PRECIO;
            }else{ $mensaje.="upp...precio incorrecto"."</br>"; break;}

            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD, KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD, KEY);
                $mensaje="OK cantidad correcta".$CANTIDAD;
            }else{ $mensaje.="upp...cantidad incorrecta"."</br>"; break;}



            if(!isset($_SESSION['CARRITO'])){

                $producto=array(
                    'id'=>$ID,
                    'nombre'=>$NOMBRE,
                    'precio'=>$PRECIO,
                    'cantidad'=>$CANTIDAD
                    
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje="producto agregado al carrito";

            }else{

                $idProductos=array_column($_SESSION['CARRITO'],"id"); //deposita todos los id del carrito de compras

                if(in_array($ID,$idProductos)){

                    echo "<script>alert('El producto ya ha sido seleccionado..');</script>";
                    $mensaje="";
                }else{
                

                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'id'=>$ID,
                    'nombre'=>$NOMBRE,
                    'precio'=>$PRECIO,
                    'cantidad'=>$CANTIDAD
                );
                $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                $mensaje="producto agregado al carrito";

            }
            }

              //$mensaje= print_r($_SESSION,true);
              $mensaje="producto agregado al carrito";

        break;


        case 'eliminar':

            if(is_numeric(openssl_decrypt($_POST['id'],COD, KEY))){
                $ID=openssl_decrypt($_POST['id'],COD, KEY);
            
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['id']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script>alert('Elemento borrado...')</script>";
                    }


                }

            }else{ $mensaje.="upp...ID incorrecto".$ID."</br>"; }

        break;


     }
}




?>