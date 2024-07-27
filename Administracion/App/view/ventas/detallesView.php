<div class="contenedor1">
    <p>Detalles venta</p>
   
</div>

<table>
    <thead>
        <tr>
            <th>DetalleVenta</th>
            <th>VentaID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($detalle as $venta) { 
    ?>
        <tr>
            <td><?php echo $venta['DetalleVentaID']; ?></td>
            <td><?php echo $venta['VentaID']; ?></td>
            <td><?php echo $venta['Nombre']; ?></td>
            <td><?php echo $venta['Cantidad']; ?></td>
            <td><?php echo $venta['PrecioUnitario']; ?></td>
            <td><?php echo $venta['Subtotal']; ?></td>
            <td>
                <button onclick="deleteVentaDetalle(<?php echo $venta['DetalleVentaID']; ?>)">Eliminar</button>
            </td>
        </tr>
    <?php 
    } ?>
    </tbody>
</table>

<script>
    function deleteVentaDetalle(id) {
        alert(id);
        if (confirm("¿Realmente quieres cancelar esta venta?")) {
            window.location.href = "http://localhost/Administracion?C=ventasController&M=deleteDetalle&id=" + id;
        }
    }
</script>
