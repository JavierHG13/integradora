<div class="contenedor-titulo">
    <p class="regresar"><a class="link-regresar" href="http://localhost/Administracion?C=productosController&M=index">Regresar</a></p>
    <div class="titulo">
        <p>AGREGAR NUEVO PRODUCTO</p>
    </div>
</div>

<div class="contenedor-formulario">
    <form action="http://localhost/Administracion/?C=productosController&M=AgregarProducto" method="post">
        <label for="nombre">Nombre del producto</label><br>
        <input type="text" name="nombre" value="" pattern="[A-Za-z\s]+" required><br>

        <label for="descripcion">Descripcion</label><br>
        <input type="text" name="descripcion" value="" pattern="[A-Za-z\s]+" required><br>

        <label for="preciocompra">Precio compra</label><br>
        <input type="number" name="preciocompra" value="" pattern="\d+(\.\d{1,2})?" required><br>

        <label for="precioventa">Precio venta</label><br>
        <input type="number" name="precioventa" value="" pattern="\d+(\.\d{1,2})?" required><br>
        
        <label for="stock">Stock</label><br>
        <input type="number" name="stock" value="" pattern="\d+" required><br>

        <label for="proveedor">Proveedor</label><br>
        <select name="proveedor" required>
            <?php foreach($proveedores as $proveedor) {?>
                <option value="<?php echo $proveedor['ProveedorID']; ?>"><?php echo $proveedor['email']; ?></option>
            <?php }?>
        </select><br>

        <label for="marca">Marca</label><br>
        <select name="marca" required>
            <?php foreach($marcas as $marca) {?>
                <option value="<?php echo $marca['MarcaID']; ?>"><?php echo $marca['Marca']; ?></option>
            <?php }?>
        </select><br>

        <label for="categoria">Categoria</label><br>
        <select name="categoria" required>
            <?php foreach($categorias as $categoria) {?>
                <option value="<?php echo $categoria['CategoriaID']; ?>"><?php echo $categoria['Categoria']; ?></option>
            <?php }?>
        </select><br>

        <label for="subcategoria">Subcategoria</label><br>
        <select name="subcategoria" required>
            <?php foreach($subcategorias as $subcategoria) {?>
                <option value="<?php echo $subcategoria['SubcategoriaID']; ?>"><?php echo $subcategoria['Subcategoria']; ?></option>
            <?php }?>
        </select><br>
        
        <label for="URL">Agregar imagen URL:</label><br>
        <input type="text" name="URL" value="" pattern="https?://.+"><br>

        <button type="submit" class="btn-agregar">Agregar</button>
    </form>
</div>
