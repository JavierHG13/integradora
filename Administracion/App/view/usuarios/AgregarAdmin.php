<div class="contenedor-datosUser">
    <h2>Perfil del Administrador</h2>
    
    <form id="formPerfil" action="http://localhost/Administracion/?C=adminController&M=Agregar" method="post">
    
        <input type="hidden" name="id" value="'Admini'">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" pattern="[A-Za-z\s]+" title="Solo se permiten letras" required>
        </div>
        <div class="form-group">
            <label for="apaterno">Apellido paterno:</label>
            <input type="text" name="apaterno" pattern="[A-Za-z\s]+" title="Solo se permiten letras" required>
        </div>
        <div class="form-group">
            <label for="amaterno">Apellido materno:</label>
            <input type="text" name="amaterno" pattern="[A-Za-z\s]+" title="Solo se permiten letras" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" title="Introduce un correo electrónico válido" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" pattern="\d{10}" title="Debe contener 10 dígitos" required>
        </div>
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" pattern="[A-Za-z0-9]+" title="Solo se permiten letras y números" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" pattern=".{8,}" title="Debe contener al menos 8 caracteres" required>
        </div>
        <button class="btn-agregar" type="submit">Agregar</button>
    </form>
</div>
