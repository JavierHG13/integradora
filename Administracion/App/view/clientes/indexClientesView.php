<div class="contenedor1">
    <p>Gestión de clientes</p>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (is_array($clientes)) {
            foreach ($clientes as $cliente): 
                if (isset($cliente['UsuarioID']) && isset($cliente['Nombre']) && isset($cliente['CorreoElectronico'])):?>
                <tr>
                    <td><?php echo $cliente['UsuarioID']; ?></td>
                    <td><?php echo $cliente['Nombre']; ?> <?php echo $cliente['Apaterno']; ?> <?php echo $cliente['Amaterno']; ?></td>
                    <td><?php echo $cliente['Telefono']; ?></td>
                    <td><?php echo $cliente['CorreoElectronico']; ?></td>
                    <td><?php echo $cliente['FechaRegistro']; ?></td>
                    <td>
                        <button onclick="compras(<?php echo $cliente['UsuarioID']; ?>)">Ver compras</button>
                        <button onclick="direccion(<?php echo $cliente['UsuarioID']; ?>)">Direccion</button>
                    </td>
                </tr>
        <?php 
                else:
                    echo "<tr><td colspan='4'>Datos incompletos para este usuario.</td></tr>";
                endif;
            endforeach; 
        } else {
            echo "<tr><td colspan='4'>No se encontraron usuarios.</td></tr>";
        }
        ?>
    </tbody>
</table>

<script>
    function compras(id) {
        window.location.href = "http://localhost/Administracion?C=clientesController&M=MostrarCompras&id=" + id;
    }
    function direccion(id) {
        window.location.href = "http://localhost/Administracion?C=clientesController&M=MostrarDireccion&id=" + id;
    }
</script>
