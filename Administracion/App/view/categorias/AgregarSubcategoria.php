
<div class="contenedor-proveedor">
        <h2>Agregar nuevo subcategoria</h2>
        
        <form action="http://localhost/Administracion/?C=categoriasController&M=addSubcategory" method="post">
        
            <input type="hidden"  name="id" value="">

            <div class="form-group">
                <label for="contacto">Subcategoria:</label>
                <input type="text"  name="subcategoria" value="">
            </div>

            <div class="form-group">
                <label for="">Categoria:</label>
                <select name="categoria">
                    <?php foreach($categorias as $categoria) {?>
                        <option value="<?php echo $categoria['CategoriaID']; ?>"><?php echo $categoria['Categoria']; ?></option>
                    <?php }?>
                </select>
            </div>
    
            <button class="btn-agregar " type="submit">Agregar</button>
        </form>

    </div>