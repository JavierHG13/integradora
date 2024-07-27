<div class="contenedor1">
    <p>Gestión de clientes</p>
</div>

<table>
    <thead>
        <tr>
            <th>VentaID</th>
            <th>Fecha de la venta</th>
            <th>Metodo de pago</th>
            <th>Estado de la venta</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($compras)): ?>
            <?php foreach ($compras as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['VentaID']; ?></td>
                    <td><?php echo $cliente['FechaVenta']; ?></td>
                    <td><?php echo $cliente['Total']; ?></td>
                    <td><?php echo $cliente['MetodoPago']; ?></td>
                    <td><?php echo $cliente['EstadoVenta']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Sin compras</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
