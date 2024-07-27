
<div class="contenedor-proveedor">
        <h2>Editar proveedor</h2>
        
        <form id="formPerfil" action="http://localhost/Administracion/?C=proveedoresController&M=Editar" method="post">
        
            <input type="hidden"  name="id" value="<?php echo $Datos['ProveedorID']; ?>">

            <div class="form-group">
                <label for="contacto">Nombre:</label>
                <input type="text"  name="contacto" value="<?php echo $Datos['contacto']; ?>">
            </div>
            <div class="form-group">
                <label for="rfc">Apellido paterno:</label>
                <input type="text"  name="rfc" value="<?php echo $Datos['rfc']; ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Apellido materno:</label>
                <input type="text" name="telefono" value="<?php echo $Datos['telefono']; ?>">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email"  name="correo" value="<?php echo $Datos['email']; ?>">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" name="direccion" value="<?php echo $Datos['direccion']; ?>">
            </div>

            <button class="btn-agregar " type="submit">Editar</button>
        </form>

    </div>