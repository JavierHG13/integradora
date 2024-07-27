<div class="contenedor1">
    <p>Gestión de Categorías</p>
    
    
    <button class="btn-agregar" onclick="window.location.href='http://localhost/Administracion?C=categoriasController&M=AgregarCategoria'">Agrgar nueva categoria</button>
    
</div>

<table>
    <thead>
        <tr>
         
            <th>CategoriaID</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categorias as $categoria) {?>
            <tr>
                <td><?php echo $categoria['CategoriaID']; ?></td>
                <td><?php echo $categoria['Categoria']; ?></td>
                <td>
                    <button onclick="edit(<?php echo $ategoria['CategoriaID']; ?>)">Editar</button>
                    <button onclick="delete(<?php echo $categoria['CategoriaID']; ?>)">Eliminar</button>
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
