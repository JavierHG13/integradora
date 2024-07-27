<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>Administracion</title>

    <link rel="stylesheet" href="App/styles/adminLogin.css">
</head>
<body>
    <div class="container">
        <h2>Inicio de sesion</h2>

        <form action='http://localhost/Administracion/?C=adminController&M=login' method="post">

            <label for="user">Ingresa su usuario:</label><br>
            <input type="text" id="user" name="user" placeholder="User" title="Ingrese su usuario" required ><br>
            <label for="pass">Ingrese su contraseña:</label><br>
            <input type="password" id="pass" name="pass" placeholder="Pass" title="Ingrese su comtraseña" required><br><br>

            <button type="submit" class="btn-login">Iniciar sesion</button>
        </form>

    </div>
    <h2 class="Leyenda"><?php echo $Mostrar = $Leyenda ? $Leyenda : ""; ?></h2>
</body>
</html>

<script>
        /* Obtener referencias a los campos de entrada y la leyenda
        const userField = document.getElementById('user');
        const passField = document.getElementById('pass');
        const leyenda = document.querySelector('.Leyenda');

        // Función para verificar el contenido de los campos
        /*function verificarCampos() {
            if (userField.value === '' && passField.value === '') {
               
            } else {
                leyenda.style.display = 'none'; // Ocultar la leyenda
            }
        }

        // Agregar event listener para el evento 'input' en los campos
        userField.addEventListener('input', verificarCampos);
        passField.addEventListener('input', verificarCampos); */


        // Escucha el evento keydown en todo el documento
        document.addEventListener('keydown', function(event) {
        // Selecciona el elemento con clase 'Leyenda'
        const leyenda = document.querySelector('.Leyenda');

        // Oculta el elemento cuando se presiona cualquier tecla
        leyenda.style.display = 'none';
});
    </script>

    