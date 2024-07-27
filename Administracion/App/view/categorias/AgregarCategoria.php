
<div class="contenedor-proveedor">
        <h2>Agregar nueva categoria</h2>
        
        <form action="http://localhost/Administracion/?C=categoriasController&M=AddCategory" method="post">
        

            <div class="form-group">
                <label for="contacto">Categoria:</label>
                <input type="text"  name="categoria" value="" required>
            </div>
            <button class="btn-agregar " type="submit">Agregar</button>
        </form>

    </div>