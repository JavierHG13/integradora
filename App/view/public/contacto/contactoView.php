    <h2>Formulario de Contacto</h2>

    <div class="container-contacto">
        <form action="http://localhost?C=contactoController&M=EnviarCorreo" method="post">

            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br><br>

            <button type="submit" class="btn-enviar">Enviar</button>
        </form>
    </div>