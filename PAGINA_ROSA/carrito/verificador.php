<?php

print_r($_GET);

$clienteID="AbX44e-8ZWrGeygDCEJoEsL8FzFeXJmaeP7hqrSoPHh7nYKqWQN2IwdwPfNNZsPb16SyZnBC0xdvbAWm"; //datos desde paypal 
$secret="EKJTmmLE5PZQYcrqWMG2G-j3rv84Bm_Az1jFY_w_eBAe_jBTmESdW8281Y6_aBea8bCZ3Xd1kVHxJ7IC";//datos desde paypal 



$login= curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");

curl_setopt($login,CURLOPT_RETURNTRANSFER,TRUE); // relacion con la varible login y la api devuelve la informacion que solicitamos

curl_setopt($login,CURLOPT_USERPWD,$clienteID.":".$secret);

curl_setopt($login,CURLOPT_POSTFIELDS,"grant_type=client_credentials");

$respuesta=curl_exec($login);




$objRespuesta=json_decode($respuesta);


$AccessToken=$objRespuesta->access_token;// se obtiene el access token

print_r($AccessToken);


$venta=curl_init("https://api.sandbox.paypal.com/v1/payments/payment/".$_GET['paymentID']);

curl_setopt($venta,CURLOPT_HTTPHEADER,array("Content-Type: application/json","Authorization: Bearer".$AccessToken));


$respuestaVenta=curl_exec($venta);
print_r($respuestaVenta);

?>