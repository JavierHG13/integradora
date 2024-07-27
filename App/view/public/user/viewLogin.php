<h3>INICIAR SESIÓN</h3>
<h3>Escribe tu usuario y contraseña para iniciar sesión:</h3>

<div class="login-container">
    <form action="http://localhost?C=userController&M=login" method="post">
        
        <label for="correo">Usuario:</label><br>
        <input type="text" name="user" placeholder="@user" require><br>

        <label for="contrasenia">Contraseña:</label><br>
        <input type="password" name="pass" placeholder="@password" require><br>
  
        <button type="submit" class="btn">Iniciar Sesion</button><br>
    </form>

    <p>¿No tienes una cuenta? <a href="http://localhost?C=userController&M=NewCount">Crear cuenta</a></p>
    <p><a href="http://localhost?C=userController&M=RescatarPssword">¿Se te olvido tu contraseña?</a></p>
</div>
<script>


function Login(){
   var user = document.getElementById('user').value;
   var pass = document.getElementById('contrasenia').value;

    if (user === '' || pass === ''){
      alert('El campo usuario o contraseña estan vacios');

      window.location.href="http://localhost?C=userController&M=index";
      return
    }else{
        alert("Tu usuario es " + user + " password " + pass);
        window.location.href="http://localhost/E-COMMERCE?C=userController&M=sesion&user="+user+"&pass="+pass;
    }
    
  }
</script>