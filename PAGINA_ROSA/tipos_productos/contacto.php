<?php include("../template/cabecera_tipos_productos.php"); ?><!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->

<div class="ubicacion">
  <a href="../index.php" class="ubicacion-texto">INICIO /</a>
  <a href="contacto.php" class="ubicacion-texto">CONTACTO</a>
</div>

<h2>CONTACTO</h2>
<div class="contacto">
  <aside>
    <div class="contacto1" id="contacto1"></div>
    <h3>Informacion de contacto</h3>
    <h4> Whatsapp 3168245409</h4>
    <h4> Correo electronico contacto@lujuriasexshop.com.co</h4>
    <h3>Dejanos un mensaje</h3>
    <form action="enviar mensaje">
      <input type="text" class="mensaje-parte1" placeholder="Nombre completo"  required  >
      <br>
      <br>
      <input type="text" class="mensaje-parte1" placeholder="Correo electonico" required>
      <br>
      <br>
      <input type="text" class="mensaje-parte1" placeholder="Asunto" required>
      <br>
      <p>Mensaje</p>
      <input type="text" class="mensaje-parte2"  required>
      <br>
      <br>
      <button type="submit" class="boton-enviar">Enviar</button>
    </form>
  </aside>

  <main>
    <div class="main-cajas">
      <h3 class="titulo-productos-destacados-contacto">Productos destacados</h3>
      <img src="../img/cuadro.jpg" alt="imagen de producto" class="productos-destacados-contacto"> 
      <br>
      <img src="../img/cuadro.jpg" alt="imagen de producto"  class="productos-destacados-contacto"> 
      <br>
      <img src="../img/cuadro.jpg" alt="imagen de producto" class="productos-destacados-contacto"> 
      <br>
      <img src="../img/cuadro.jpg" alt="imagen de producto" class="productos-destacados-contacto"> 
      <br>
      <img src="../img/cuadro.jpg" alt="imagen de producto" class="productos-destacados-contacto"> 
      <br>
      <img src="../img/cuadro.jpg" alt="imagen de producto" class="productos-destacados-contacto"> 
    </div>
  </main>

</div>

<?php include("../template/pie_tipos_productos.php"); ?> <!--Corresponde al pie de pagina-->