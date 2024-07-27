<div class="contenedor-botones">
    <button class="btn-nuevo" onclick="(window.location.href='http://localhost/Administracion/?C=adminController&M=AgregarNuevo')">Agregar Nuevo</button>
</div>
    
    <div class="contenedor-datosUser">
        <h2>Perfil del Administrador</h2>
        
        <form id="formPerfil" action="" method="post">
        
            <input type="hidden"  name="id" value="<?php echo $Datos['AdministradorID']; ?>">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text"  name="nombre" value="<?php echo $Datos['Nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="apaterno">Apellido paterno:</label>
                <input type="text"  name="apaterno" value="<?php echo $Datos['Apaterno']; ?>">
            </div>
            <div class="form-group">
                <label for="amaterno">Apellido materno:</label>
                <input type="text" name="amaterno" value="<?php echo $Datos['Amaterno']; ?>">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email"  name="correo" value="<?php echo $Datos['CorreoElectronico']; ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" value="<?php echo $Datos['Telefono']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Usuario:</label>
                <input type="text" name="usuario" value="<?php echo $Datos['Usuario']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password"  name="password" value="<?php echo $Datos['Contrasena']; ?>">
            </div>
            <button type="submit" class="btn-agregar ">Guardar Cambios</button>
        </form>

    </div>