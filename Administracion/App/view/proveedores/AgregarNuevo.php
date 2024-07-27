
<div class="contenedor-proveedor">
        <h2>Agregar nuevo proveedor</h2>
        
        <form action="http://localhost/Administracion/?C=proveedoresController&M=Agregar" method="post">
        
            <input type="hidden"  name="id" value="">

            <div class="form-group">
                <label for="contacto">Contacto:</label>
                <input type="text"  name="contacto" value="">
            </div>
            <div class="form-group">
                <label for="rfc">RFC:</label>
                <input type="text"  name="rfc" value="">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" value="">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email"  name="correo" value="">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" name="direccion" value="">
            </div>

            <button class="btn-agregar " type="submit">Agregar</button>
        </form>

    </div>