<div class="contenedor1">
    <p>Gestión de Ventas</p>
   
</div>

<table>
    <thead>
        <tr>
            <th>VentaID</th>
            <th>ClienteID</th>
            <th>Fecha</th>
            <th>Metoso de pago</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($ventas as $venta) { 
    ?>
        <tr>
            <td><?php echo $venta['VentaID']; ?></td>
            <td><?php echo $venta['UsuarioID']; ?></td>
            <td><?php echo $venta['FechaVenta']; ?></td>
            <td><?php echo $venta['MetodoPagoID']; ?></td>
            <td><?php echo $venta['Total']; ?></td>
            <td><?php echo $venta['EstadoVenta']; ?></td>
            <td>
                <button onclick="detalles(<?php echo $venta['VentaID']; ?>)">Detalles</button>
                <button onclick="deleteVenta(<?php echo $venta['VentaID']; ?>)">Eliminar</button>
            </td>
        </tr>
    <?php 
    } ?>
    </tbody>
</table>

<script>
function detalles(id) {
    window.location.href = "http://localhost/Administracion?C=ventasController&M=VerDetalles&idventa=" + id;
}

function deleteVenta(id) {
    if (confirm("¿Realmente quieres eliminar la venta?")) {
        window.location.href = "http://localhost/Administracion?C=ventasController&M=eliminarventa&id=" + id;
    }
}
</script>


