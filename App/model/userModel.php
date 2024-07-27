<?php
    class UserModel{
        //creamos la instancia para conectar con la base de datos 
        private $objetoConexion;

        //creamos el constructos para conectar desde ahi con la base de datos 
        public function __construct(){
            //llamamos a la clase coneccion para vincular el model user con la base de datos 
            require_once("App/config/BDConecction.php");
            //creamos la instancia de la coneccion a la base de datos en objetoConexion
            
            $this->objetoConexion=new BDConecction();
        }

        //metodo para validar un logueo (usuario y contraseña)
        public function getCredentials($User, $Pass){
            // Paso 1: Preparar la consulta SQL con los parámetros recibidos
            $consulta = "SELECT * FROM usuarios WHERE Usuario='$User' AND Contrasena='$Pass'";
        
            // Paso 2: Conectamos con la base de datos utilizando un objeto de conexión (objetoConexion)
            $conexion = $this->objetoConexion->getConeccion();
        
            // Paso 3: Ejecutamos la consulta SQL
            $resultado = $conexion->query($consulta);
        
            // Paso 4: Verificamos si se encontró al menos un resultado
            if ($resultado && $resultado->num_rows > 0) {

                $DatosUser = $resultado->fetch_assoc();
            }else{
                $DatosUser = false;
            }
        
            // Paso 5: Cerramos la conexión a la base de datos
            $this->objetoConexion->closeConeccion();
        
            // Paso 6: Retornamos los resultados obtenidos (datos del usuario encontrado o false si no se encontró)
            return $DatosUser;
        }
        

        public function CreateCount($Usuario){
            if(!isset($Usuario['nombre'], $Usuario['apaterno'], $Usuario['amaterno'], $Usuario['correo'], $Usuario['contrasenia'])){
                return false;
            }
            $nombre=$Usuario['nombre'];
            $apaterno=$Usuario['apaterno'];
            $amaterno=$Usuario['amaterno'];
            $correo=$Usuario['correo'];
            $user = $Usuario['usuario'];
            $password=$Usuario['contrasenia'];
            
            $Consulta = "INSERT INTO usuarios(nombre, apaterno, amaterno, CorreoElectronico, Contrasena, Usuario)
            VALUES('$nombre', '$apaterno','$amaterno','$correo','$password', '$user')";

            $conexion = $this->objetoConexion->getConeccion();

            $resultado=$conexion->query($Consulta);
            
            if($resultado){
                //Despues de haber insertado al usuario realizamos un select con sus datos para inicializar la session
                $BuscarDatos = "SELECT * FROM usuarios WHERE CorreoElectronico='$correo' AND Contrasena='$password'";
                //Utilizamos la conexion utilizada anteriormente
                $Datos=$conexion->query($BuscarDatos);
                //Obtenemos los datos del usuario agregado recientemente y esa va a ser nuestra respuesta
                $respuesta = $Datos->fetch_assoc();
            }else{
                 $respuesta = false;
            }
            $this->objetoConexion->closeConeccion();

            return $respuesta;
        }
            
    }
?>