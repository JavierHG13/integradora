<div class="contenedor1">
    <p>Gestión de Proveedores</p>
    <button class="btn-agregar" onclick="window.location.href='http://localhost/Administracion?C=proveedoresController&M=AgregarNuevo'">Agregar Proveedor</button>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Contacto</th>
            <th>RFC</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($proveedores as $proveedor) {?>
                <tr>
                    <td><?php echo $proveedor['ProveedorID']; ?></td>
                    <td><?php echo $proveedor['contacto']; ?></td>
                    <td><?php echo $proveedor['rfc']; ?></td>
                    <td><?php echo $proveedor['telefono']; ?></td>
                    <td><?php echo $proveedor['email']; ?></td>
                    <td><?php echo $proveedor['direccion']; ?></td>
                    <td>
                    <button onclick="editar(<?php echo $proveedor['ProveedorID']; ?>)">Editar</button>
                    <button onclick="eliminar(<?php echo $proveedor['ProveedorID']; ?>)">Eliminar</button>

                    </td>
                </tr>
            <?php }?>
    </tbody>
</table>

<script>
    function editar(id) {
    window.location.href = "http://localhost/Administracion?C=proveedoresController&M=EditarProveedor&id=" + id;
    }

    function eliminar(id) {
        if (confirm("¿Realmente quieres eliminar al proveedor?")) {
            window.location.href = "http://localhost/Administracion?C=proveedoresController&M=delete&id=" + id;
        }
    }
</script>
