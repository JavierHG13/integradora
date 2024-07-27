<h3 class="titulo">CARRITO DE COMPRAS</h3>

<div class="container">

    <div class="cart-container">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            
            <tbody>
                <?php if (!empty($ProductosAgregados)) { ?>
                    <?php foreach($ProductosAgregados as $Agregado) { ?>
                        <tr>
                            <input type="hidden" value="<?php echo $Agregado['Nombre']; ?>">
                        </tr>
                        <tr>
                            <td class="product">
                                <p><?php echo $Agregado['Nombre']; ?></p>
                            </td>
                            <td><?php echo $Agregado['PrecioVenta']; ?></td>
                            <td class="cantidad">
                                <button class="btn-cantidad" onclick="Restar(<?php echo $Agregado['DetalleCarritoID']; ?>, <?php echo $Agregado['ProductoID']; ?>)">-</button>
                                <?php echo $Agregado['Cantidad']; ?>
                                <button class="btn-cantidad" onclick="Sumar(<?php echo $Agregado['DetalleCarritoID']; ?>, <?php echo $Agregado['ProductoID']; ?>)">+</button>
                            </td>
                            <td>$<?php echo $Agregado['Subtotal']; ?></td>
                        </tr>
      
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">Carrito vacío</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <div class="cart-summary">
        <h3 class="titulo-summary">Total del carrito</h3>

            <div class="Articulos">
                <p>Articulos:</p>
                <h4><?= isset($TotalAgregado['Articulos']) ? $TotalAgregado['Articulos'] : '0'; ?></h4>
            </div>

            <div class="Articulos">
                <p>Cantidad:</p>
                <h4><?= isset($TotalAgregado['CantidadTotal']) ? $TotalAgregado['CantidadTotal'] : '0'; ?></h4>
            </div>

            <div class="Articulos">
                <p>Total:</p>
                <h4>$<?= isset($TotalAgregado['Total']) ? $TotalAgregado['Total'] : '0.00'; ?></h4>
            </div>
            
            <button onclick="window.location.href='http://localhost?C=cartController&M=checkOut'" class="btn">Continuar Compra</button>
            <!-- <button class="btn paypal">Pay with Mercado Pago</button> -->
        </div>
    </div>

</div>
<script>
    function Sumar(DetalleCarritoID, ProductoID){

        window.location.href="http://localhost?C=cartController&M=SumarCart&CartDetailID="+DetalleCarritoID+"&ProductoID="+ProductoID;
    }
    function Restar(DetalleCarritoID, ProductoID){
        window.location.href="http://localhost?C=cartController&M=RestarCart&CartDetailID="+DetalleCarritoID+"&ProductoID="+ProductoID;
    }
</script>