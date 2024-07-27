<?php
// Define la clase adminModel
class adminModel {

    // Propiedad privada para almacenar el objeto de conexión a la base de datos
    private $objetoConexion;

    // Constructor de la clase
    public function __construct() {
        // Requiere el archivo de configuración de la conexión a la base de datos
        require_once("App/config/BDConecction.php");

        // Crea una nueva instancia del objeto de conexión a la base de datos
        $this->objetoConexion = new BDConecction();
    }

    // Método para obtener las credenciales del administrador
    public function getCredencials($user, $pass) {
        // Define la consulta SQL para seleccionar el administrador con el usuario y contraseña proporcionados
        $sql = "SELECT * FROM administradores WHERE Usuario='$user' AND Contrasena='$pass'";

        // Obtiene la conexión a la base de datos
        $conexion = $this->objetoConexion->getConeccion();

        // Ejecuta la consulta SQL
        $resultado = $conexion->query($sql);

        // Verifica si la consulta devolvió algún resultado
        if ($resultado && $resultado->num_rows > 0) {
            // Si hay resultados, obtiene la primera fila como un array asociativo
            $respuesta = $resultado->fetch_assoc();
        } else {
            // Si no hay resultados, establece la respuesta como false
            $respuesta = false;
        }

        // Cierra la conexión a la base de datos
        $this->objetoConexion->closeConeccion();

        // Devuelve la respuesta
        return $respuesta;
    }

    public function getById($id){

        $sql = "SELECT * FROM administradores WHERE AdministradorID=$id";

        // Obtiene la conexión a la base de datos
        $conexion = $this->objetoConexion->getConeccion();

        // Ejecuta la consulta SQL
        $resultado = $conexion->query($sql);

        // Verifica si la consulta devolvió algún resultado
        if ($resultado && $resultado->num_rows > 0) {
            // Si hay resultados, obtiene la primera fila como un array asociativo
            $respuesta = $resultado->fetch_assoc();
        } else {
            // Si no hay resultados, establece la respuesta como false
            $respuesta = false;
        }

        // Cierra la conexión a la base de datos
        $this->objetoConexion->closeConeccion();

        // Devuelve la respuesta
        return $respuesta;
    }

    public function update($usuario){
        //Si es no esta definido y no esta vacio
        if (!isset($usuario['id'],
            $usuario['nombre'],
            $usuario['apaterno'],
            $usuario['amaterno'],
            $usuario['correo'],
            $usuario['telefono'],
            $usuario['usuario'],
            $usuario['contrasena']
        ) || 
            empty($usuario['id']) ||
            empty($usuario['nombre']) ||
            empty($usuario['apaterno']) ||
            empty($usuario['amaterno']) ||
            empty($usuario['correo']) ||
            empty($usuario['telefono']) ||
            empty($usuario['usuario']) ||
            empty($usuario['contrasena'])
        ) {
            return false;
        }

        $Id = $usuario['id'];
        $Nombre = $usuario['nombre'];
        $Apaterno = $usuario['apaterno'];
        $Amaterno = $usuario['amaterno'];
        $Correo = $usuario['correo'];
        $Telefono = $usuario['telefono'];
        $UsuarioNombre = $usuario['usuario']; // Usé $UsuarioNombre para evitar confusión con el array
        $Contrasena = $usuario['contrasena'];

           // Construye la consulta SQL
        $ConsultaSQL = "UPDATE administradores 
        SET Nombre = '$Nombre', 
            Apaterno = '$Apaterno', 
            Amaterno = '$Amaterno', 
            Contrasena = '$Contrasena', 
            CorreoElectronico = '$Correo', 
            Usuario = '$UsuarioNombre', 
            Telefono = '$Telefono' 
        WHERE AdministradorID = $Id";

        // Obtiene la conexión a la base de datos
        $conexion = $this->objetoConexion->getConeccion();
        // Ejecuta la consulta
        $resultado = $conexion->query($ConsultaSQL);
        //Validar el resultado
        $respuesta = $resultado ? true : false;
        // Cierra la conexión
        $this->objetoConexion->closeConeccion();
        // Devuelve el resultado
        return $respuesta;
    }

    public function add($usuario){
         //Si es no esta definido y no esta vacio
        if (!isset($usuario['nombre'],
            $usuario['apaterno'],
            $usuario['amaterno'],
            $usuario['correo'],
            $usuario['telefono'],
            $usuario['usuario'],
            $usuario['contrasena']
        ) || 
            empty($usuario['nombre']) ||
            empty($usuario['apaterno']) ||
            empty($usuario['amaterno']) ||
            empty($usuario['correo']) ||
            empty($usuario['telefono']) ||
            empty($usuario['usuario']) ||
            empty($usuario['contrasena'])
        ) {
            return false;
        }

        $Nombre = $usuario['nombre'];
        $Apaterno = $usuario['apaterno'];
        $Amaterno = $usuario['amaterno'];
        $Correo = $usuario['correo'];
        $Telefono = $usuario['telefono'];
        $UsuarioNombre = $usuario['usuario']; // Usé $UsuarioNombre para evitar confusión con el array
        $Contrasena = $usuario['contrasena'];

        $ConsultaSQL = "INSERT INTO administradores(Nombre, Apaterno, Amaterno, Contrasena, CorreoElectronico, Usuario, Telefono) VALUES 
        ('$Nombre', '$Apaterno', '$Amaterno', '$Contrasena', '$Correo', '$UsuarioNombre', '$Telefono')";

        // Obtiene la conexión a la base de datos
        $conexion = $this->objetoConexion->getConeccion();
        // Ejecuta la consulta
        $resultado = $conexion->query($ConsultaSQL);
        //Validar el resultado
        $respuesta = $resultado ? true : false;
        // Cierra la conexión
        $this->objetoConexion->closeConeccion();
        // Devuelve el resultado
        return $respuesta;
    }
}
?>
