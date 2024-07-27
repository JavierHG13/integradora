<div class="contenedor-regresar">
    <p class="regresar"><a class="link-regresar" href="http://localhost/Administracion?C=productosController&M=index">Regresar</a> / <?php echo $Producto['Nombre']; ?><p>
</div>

<div class="contenedor-titulo">
    <p class="titulo">Editar producto</p>
</div>

<div class="contenedor-formulario">
    <form action="http://localhost/Administracion/?C=productosController&M=Actualizar" method="post">
        
        <input type="hidden" name="idproducto" value="<?php echo $Producto['ProductoID']; ?>">
        <label for="nombre">Nombre del producto</label><br>
        <input type="text" name="nombre" value="<?php echo $Producto['Nombre']; ?>"><br>
        <label for="precio">Precio venta</label><br>
        <input type="number" name="precio" value="<?php echo $Producto['PrecioVenta']; ?>"><br>
        <label for="stock">Stock</label><br>
        <input type="number" name="stock" value="<?php echo $Producto['Stock']; ?>"><br>
    
        
        <label for="">Categoria</label><br>

        <select name="categoria">
            <option value="<?php echo $Producto['CategoriaID']; ?>">Preterminado</option>

            <?php foreach($categorias  as $categoria) {?>
                <option value="<?php echo $categoria['CategoriaID']; ?>"><?php echo $categoria['Categoria']; ?></option>
            <?php }?>

        </select><br>

        <label for="">Subategoria</label><br>

        <select name="subcategoria">Preterminado
            <option value="<?php echo $Producto['SubcategoriaID']; ?>">Preterminado</option>

            <?php foreach($subcategorias as $subcategoria) {?>
                <option value="<?php echo $subcategoria['SubcategoriaID']; ?>"><?php echo $subcategoria['Subcategoria']; ?></option>
            <?php }?>

        </select><br>
        
        <label for="">Cambiar imagen:</label>
        
        <input type="text" name="URL" value="<?php echo $Producto['Imagen']; ?>" >
        

        <button type="submit" class="btn-agregar">Actualizar</button>
    </form>
</div>
