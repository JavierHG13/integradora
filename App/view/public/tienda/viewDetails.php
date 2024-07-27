
<div class="container">
    <p class="Regresar"><a href="http://172.31.98.32?C=productoController&M=index">Inicio </a>/  <?= $Detalles['Nombre'] ?></p>

    <div class="container-detalles">
            <img src="<?php echo $Detalles['imagen']?>" alt="" class="imagen-producto">

            <div class="info-productos">
                <p>Nombre:<?php echo $Detalles['Nombre']?></p>
                <p>Marca:<?php echo $Detalles['Marca']?></p>
                <p>Categoria:<?php echo $Detalles['Categoria']?></p>
                <p>Precio: <?php echo $Detalles['Precio_venta']?></p>
                <p>Descuento: 0.00$</p>
                <p>Descripcion: <?php echo $Detalles['Descripcion']?></p>
                  
                <button type="button" class="button-agregar" onclick="Agregar(<?php echo $Detalles['ProductoID']?>)">Agregar al carrito</button>
            </div>

    </div>
 </div>

 <script type="text/javascript">

    function Agregar(idproducto){
        alert(idproducto);
    }
 </script>