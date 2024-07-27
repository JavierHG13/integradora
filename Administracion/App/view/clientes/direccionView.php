<div class="contenedor-proveedor">
        <h2>Direccion del cliente:</h2>
        
        <form action="" method="post">
        

            <div class="form-group">
                <label for="contacto">Direccion:</label>
                <p><?php echo $direccion['Direccion']; ?></p>
            </div>
            <div class="form-group">
                <label for="contacto">Ciudad:</label>
                <p><?php echo $direccion['Ciudad']; ?></p>
            </div>
            <div class="form-group">
                <label for="contacto">Estado:</label>
                <p><?php echo $direccion['Estado']; ?></p>
            </div>
            <div class="form-group">
                <label for="contacto">Codigo postal::</label>
                <p><?php echo $direccion['CodigoPostal']; ?></p>
            </div>
            <button class="btn-agregar" type="button">Regresar</button>
        </form>

    </div>