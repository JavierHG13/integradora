<div class="contenedor1">
    <p>Gestión de Productos</p>
    <button class="btn-agregar" onclick="window.location.href='http://localhost/Administracion?C=productosController&M=AgregarNuevo'">Agregar Producto</button>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (is_array($Productos)) {
            foreach ($Productos as $Producto): 
                if (isset($Producto['ProductoID']) && isset($Producto['Nombre']) && isset($Producto['PrecioVenta']) && isset($Producto['Stock'])):
        ?>
                <tr>
                    <td><?php echo $Producto['ProductoID']; ?></td>
                    <td><?php echo $Producto['Nombre']; ?></td>
                    <td><?php echo $Producto['PrecioVenta']; ?></td>
                    <td><?php echo $Producto['Stock']; ?></td>
                    <td>
                    <button class="btn-editar" onclick="window.location.href='http://localhost/Administracion?C=productosController&M=FormularioEditar&idproducto=<?php echo $Producto['ProductoID']; ?>'">Editar</button>
                    <button class="btn-eliminar" onclick="confirmDelete(<?php echo $Producto['ProductoID']; ?>)">Eliminar</button>
                    </td>
                </tr>
        <?php 
                else:
                    echo "<tr><td colspan='5'>Datos incompletos para este producto.</td></tr>";
                endif;
            endforeach; 
        } else {
            echo "<tr><td colspan='5'>No se encontraron productos.</td></tr>";
        }
        ?>
    </tbody>
</table>
<script>
    function confirmDelete(id) {
        if (confirm("¿Deseas eliminar este producto?")) {
            window.location.href = "http://localhost/Administracion?C=productosController&M=Eliminar&idproducto=" + id;
        }
    }
</script>


