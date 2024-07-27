<div class="container">

    <section class="seccion-opciones">

        <div class="toggle-btn" id="toggle-btn">

          <div class="menu-icon" onclick="toggleSidebar()"><span>&#9776;</span></div>
          
            <div class="sidebar" id="sidebar">

              <form action="http://localhost/?C=productoController&M=Filtros" method="post">
                <div class="options-group">
                  <label for="">Precios</label>
                  <select name="Precio" id="" class>
                    <option value="">Todos</option>
                    <option value="DESC">De mayor a menor</option>
                    <option value="ASC">De menor a mayor</option>
                  </select>
                </div>

                <div class="options-group">
                  <label for="">Categorias</label>
                  <select name="Categoria" id="" class>
                    <option value="">Todos</option>
                    <option value="producto para barba">Producto para barba</option>
                    <option value="producto para cabello">Producto para cabello</option>
                  </select>
                </div>

                <div class="options-group">
                  <label for="">Marcas</label>
                  <select name="Marca" id="" class>
                    <option value="">Todos</option>
                    <option value="Bear">Bear</option>
                    <option value="Viking">Viking</option>
                    <option value="American Crew">American crew</option>
                  </select>
                </div>

                <button type="submit" >Filtrar</button>

              </form>
            </div>

          <div class="overlay" id="overlay" onclick="toggleSidebar()"></div> 
        
        </div>

        <div class="contenedor-buscar">
          <input type="text" id="search-input" placeholder="Nombre del producto..." class="search-input">
          <button id="filter-btn" onclick="BuscarPorNombre()">Buscar</button>
        </div>

    </section>

    <div id="loginModal" class="modal-container">
          <div class="modal-viewLogin">

          <p>Por favor, inicia sesión para agregar productos al carrito.</p>

          <button onclick="window.location.href = 'http://localhost?C=userController&M=index';" class="link-tienda">Iniciar sesion</button>
          <button onclick="cerrarModal()">Cerrar</button>
      </div>
    </div>

    <section class="section-productos">
        <?php foreach($Datos as $Productos) {?>
            
          <div class="contenedor-productos">
            <img src="<?php echo $Productos['imagen']?>" alt="" class="imagen-producto">
            
            <div class="info-productos">

              <p><?php echo $Productos['Nombre']?></p>
              <p><?php echo $Productos['PrecioVenta']?></p>
              <p><?php echo $Productos['Descripcion']?></p>
              <p class="stock"><?php echo  $Productos['Stock'] >= 1 ? "" : "Producto sin stock"?></p>

              <?php
                // Verificación de inicio de sesión del usuario
                $Login = isset($_SESSION['logedin']) && $_SESSION['logedin'] === true;

                if (isset($_SESSION['MiSesion']) && !empty($_SESSION['MiSesion'])) {
                  $Login = true;
                }else{
                  $Login  = false;
                }
                ?>

              <div class="botonera">
                  <button onclick="Agregar(<?php echo $Productos['ProductoID']?>)" class="btn" data-logged-in="<?php echo  $Login? 'true' : 'false'; ?>">Agregar</button>
                  <button onclick="Detalles(<?php echo $Productos['ProductoID']?>)" class="btn detalles">Detalles</button>
              </div>   

            </div>
          </div> 
        <?php }?>
      </section>
</div>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const sidebarLeft = sidebar.style.left;

    if (sidebarLeft === '0px') {
        sidebar.style.left = '-270px';
        overlay.classList.remove('show');
    } else {
        sidebar.style.left = '0px';
        overlay.classList.add('show');
    }
  }

  // Función para agregar un producto al carrito
  function Agregar(ProductoID) {
    window.location.href = "http://localhost?C=cartController&M=addToCart&idproducto=" + ProductoID;
  }

  // Función para ver detalles de un producto
  function Detalles(ProductoID) {
    window.location.href = "http://localhost?C=productoController&M=viewDetails&idproducto=" + ProductoID;
  }

  // Función para buscar productos por nombre
  function BuscarPorNombre() {
    var nombre = document.getElementById('search-input').value;

    if (nombre === '') {
      alert('Por favor ingrese el nombre de producto');
      return;
    }

    window.location.href = "http://localhost?C=productoController&M=Search&nombre=" + nombre;
  }

</script>