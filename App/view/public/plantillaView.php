<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">


    <title><?php echo isset($Titulo) ? htmlspecialchars($Titulo) : 'Sin título'; ?></title>

    <?php 
    // Imprime todo los estilos que traiga la pagina al ser cargada
    if (isset($ListaDeEstilos) && is_array($ListaDeEstilos)) {
        foreach ($ListaDeEstilos as $Estilo) {
            echo '<link rel="stylesheet" href="' . htmlspecialchars($Estilo) . '">' . "\n";
        }
    } 
    ?>

</head>
<body>

    <header class="header-main" id="header-main">
        <div class="container-logo">
            <img src="App/assests/img/logo-barberia-scalper-studio-web.pn" alt="Logo" class="logo" width="150px" height="60px">
        </div>
        <nav class="nav">
            <ul>
                <a href="http://localhost?C=homeController&M=index"><li>HOME</li></a>
                <a href="http://localhost?C=productoController&M=index"><li>TIENDA</li></a>
                <a href="http://localhost?C=contactoController&M=Formulario"><li>CONTACTO</li></a>
                <a href=""><li>ACERCA DE NOSTROS</li></a>
                
            </ul>
        </nav>
            <a  class="cart"  href="http://localhost?C=cartController&M=index"><img src="App/assests/img/icon-cart.svg" alt="" width:"35px" height: "35px"></a>
            
            <span id="perfil"><a href="http://localhost?C=userController&M=index">&#128100</a></span>
        </div>
    </header>

    <main>
    <?php
        include_once($vista);
    ?>

    </main>

    <footer>
        <div class="footer-container">
            <p>@Todos los derechos reservados ...</p>
        </div>
    </footer>
    
</body>
</html>