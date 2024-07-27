<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
 
    <title><?php echo isset($Titulo) ? htmlspecialchars($Titulo) : 'Sin título'; ?></title>

    <?php 
        // Imprime todos los estilos que traiga la página al ser cargada
        if (isset($ListaDeEstilos) && is_array($ListaDeEstilos)) {
            foreach ($ListaDeEstilos as $Estilo) {
                echo '<link rel="stylesheet" href="' . htmlspecialchars($Estilo) . '">' . "\n";
            }
        } 
    ?>

</head>
<body>
    <header>
        <div class="iconos-navegacion">
            <div class="btn-home" onclick="window.location.href='http://localhost/Administracion?C=inicioController&M=index'"><span>&#127968;</span></div>

            <nav>
                <div class="toggle-btn" id="toggle-btn">
                    <div class="btn-menu" id="btn-menu" onclick="toggleSidebar()"><span>&#9776;</span></div> 
                    <div class="sidebar" id="sidebar">
                        <li><a href="http://localhost/Administracion?C=adminController&M=index">Inicio</a></li>
                        <li><a href="http://localhost/Administracion?C=productosController&M=index">Gestión de Productos</a></li>
                        <li><a href="http://localhost/Administracion?C=categoriasController&M=index">Gestión de Categorías</a></li>
                        <li><a href="http://localhost/Administracion?C=proveedoresController&M=index">Gestión de Proveedores</a></li>
                        <li><a href="http://localhost/Administracion?C=clientesController&M=index">Gestión de clientes</a></li>
                        <li><a href="http://localhost/Administracion?C=ventasController&M=index">Gestión de Ventas</a></li>
                        <li><a href="http://localhost/Administracion?C=adminController&M=LogOut">Cerrar sesión</a></li>
                    </div>
                    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div> 
                </div>
            </nav>
        </div>
        
        <div>
            <h2>Administración e-commerce</h2>
        </div>

        <div class="contenedor-perfil">
            <span id="perfil" class="btn-perfil"><a href="http://localhost/Administracion/?C=adminController&M=Perfil">&#128100</a></span>
        </div>
    </header>

    <main>
        <div class="container">
            <?php
                if (isset($vista) && file_exists($vista)) {
                    include_once($vista);
                } else {
                    echo "La vista especificada no existe o no se ha definido correctamente.";
                }
            ?>
        </div>
    </main>
    <footer>
        <p class="titulo-footer">@Derechos reservados 2024</p>
    </footer>

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
    </script>
</body>
</html>