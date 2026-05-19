<?php
    class InicioSesionController {

        public function __construct() {
            require_once "Modelo/UsuariosModel.php";
        }

        public function index() {
            $error = isset($_GET['error']) ? $_GET['error'] : '';
            require_once "Vista/Sesion/InicioSesion.php";
        }

        public function validar() {
            session_start();
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $modelo = new Usuarios_model();
            $usuario = $modelo->verificarCredenciales($correo, $contrasena);

            if ($usuario) {
                $_SESSION['usuario_id'] = $usuario['Id_usuario'];
                $_SESSION['nombre'] = $usuario['Nombre'];
                header("Location: index.php?c=Inicio&a=index");
            } else {
                header("Location: index.php?c=InicioSesion&a=index&error=1");
            }
        }

        public function cerrar() {
            session_start();
            session_destroy();
            header("Location: index.php?c=InicioSesion&a=index");
        }
    }
?>
