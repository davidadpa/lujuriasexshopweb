<?php


$conexion = mysqli_connect("localhost","root","","sexshop_bd"); // conoxion a la base de datos

/*
if($conexion){
    echo 'Conectado a bd';
}else{
    echo 'no conectado';
}
*/

$nombre_completo = $_POST['nombre_completo']; //Se toman los datos del forumario
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena= hash('sha512',$contrasena);// encriptar la contraseña de los cliente, el metodo utilizado es sha512

$query = "INSERT INTO tlb_clientes(cliente_nombre, cliente_correo, cliente_telefono, cliente_usuario, cliente_contrasena) VALUES ('$nombre_completo', '$correo', '$telefono', '$usuario', '$contrasena')";     // se crea la varible para insertar los datos en la tabla


/*verificar que el correo no se repita en la base de datos*/
$verificar_correo = mysqli_query($conexion, "SELECT * FROM tlb_clientes WHERE cliente_correo='$correo' ");
if(mysqli_num_rows($verificar_correo) > 0){
    echo '
    <script>
        alert("Este correo ya esta registrado, intenta con otro correo diferente");
        window.location ="../login_clientes.php"; 
    </script>
    ';
    exit();//termina el script del codigo para que no se utilice el codigo de y se ingrese el mismo correo 2 veces
}

/*verificar que el usuario no se repita en la base de datos*/
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM tlb_clientes WHERE cliente_usuario='$usuario' ");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
    <script>
        alert("Este usuario ya esta registrado, intenta con otro usuario diferente");
        window.location ="../login_clientes.php"; 
    </script>
    ';
    exit();//termina el script del codigo para que no se utilice el codigo de y se ingrese el mismo correo 2 veces

}

$ejecutar = mysqli_query($conexion, $query); 

if($ejecutar){
    echo '
    <script>
        alert("Usuario Creado exitosamente");
        window.location ="../login_clientes.php"; 
    </script>
    ';
}else{
    echo '
    <script>
        alert("Intentalo de nuevo, Usuario no almacenado");
        window.location ="../login_clientes.php"; 
    </script>
    ';
}

mysqli_close($conexion);

?>