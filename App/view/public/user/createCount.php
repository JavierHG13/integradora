<style>
    h3{
    text-align: center;
}
.container-form{
   height: 87vh;
   display: flex;
   justify-content: flex-start;
   flex-direction: column;
   align-items: center;
}
form{
    border: 1px solid rgb(0 0 0 /9%);
    border-radius: 10px;
    width: 300px;
    height: 420px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    font-family: sans-serif;
    box-shadow: 0 3px 13px 1px rgb(0 0 0 /9%);
    display: flex;
}
.btn{
    display: block;
    padding: 10px;
    margin-top: 10px;
    text-align: center;
    background-color: #333;
    color: white;
    border: none;
    cursor: pointer;
}

.btn:hover {
    background-color: #555;
}
</style>

<h3>CREAR CUENTA</h3>

<div class="container-form">

    <form action="http://localhost?C=userController&M=AddUser" method="post">
        <label for="">Ingrese su nombre:</label><br>
        <input type="text" name="nombre"><br>

        <label for="">Ingrese su apellido paterno:</label><br>
        <input type="text" name="apaterno"><br>

        <label for="">Ingrese su apellido materno:</label><br>
        <input type="text" name="amaterno"><br>


        <label for="">Ingrese su usuario:</label><br>
        <input type="text" name="usuario"><br>

        <label for="">Ingrese su correo:</label><br>
        <input type="text" name="correo"><br>

        <label for="">Ingrese su contraseña:</label><br>
        <input type="text" name="contrasenia"><br>

        <button type="submit" class="btn">Crear usuario</button>
    </form>

    <p>¿Ya tienes una cuenta? <a href="http://localhost?C=userController&M=index">Iniciar sesion</a></p>
</div>