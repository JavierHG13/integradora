<div class="contenedor1">
    <p>Gestión de Subcategorías</p>
    
    <button class="btn-agregar" onclick="window.location.href='http://localhost/Administracion?C=categoriasController&M=AgregarSubcategoria'">Agregar Subcategoría</button>
    
    <button class="btn-agregar" onclick="window.location.href='http://localhost/Administracion?C=categoriasController&M=Categorias'">Ver categorías</button>
    
</div>

<table>
    <thead>
        <tr>
         
            <th>Subcategoría</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($subcategorias as $subcategoria) {?>
            <tr>
                <td><?php echo $subcategoria['SubcategoriaID']; ?></td>
                <td><?php echo $subcategoria['Subcategoria']; ?></td>
                <td><?php echo $subcategoria['Categoria']; ?></td>
                <td>
                    <button onclick="edit(<?php echo $subcategoria['SubcategoriaID']; ?>)">Editar</button>
                    <button onclick="delete(<?php echo $subcategoria['SubcategoriaID']; ?>)">Eliminar</button>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>

<script>
    function edit(id) {
        window.location.href = "http://localhost/Administracion?C=subcategoriasController&M=callFormEdit&id=" + id;
    }
    function delete(id) {
        if (confirm("¿Realmente quieres eliminar la subcategoría?")) {
            window.location.href = "http://localhost/Administracion?C=subcategoriasController&M=delete&id=" + id;
        }
    }
</script>
