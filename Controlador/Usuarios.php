<!-- Une modelo y vista -->
<?php

    class UsuariosController
    {

        public function __construct()
        {
            require_once "Modelo/UsuariosModel.php";
        }

        public function index(){
            // LLama al modelo(archivo)
            require_once "Modelo/UsuariosModel.php";
            // Creamos un objeto del modelo llamandolo estudiantes, del modelo tomas el nombre de la clase(Estudiantes_model)  
            $usuarios = new Usuarios_model();
            // LLama la funcion/metodo llamado get_estu... muestra los datos de estudiantes
            // Variable llamada data, que es un arreglo por eso los corchetes
            $data["titulo"] = "Usuarios";
            $data["usuarios"] = $usuarios->get_usuarios();

            // Carga la vista(archivo) para enviar data
            require_once "Vista/Usuarios/Usuarios.php";
        } 
        public function insertar() 
        {
            $data["titulo"] = "Usuarios";
            require_once "Vista/Usuarios/InsertarUsuarios.php";
        }

        public function guardar() 
        {
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $usuarios = new Usuarios_model();
            $usuarios->insertar($nombre, $usuario, $correo, $contrasena);
            
            $data["titulo"] = "Usuarios";
            $this->index();
        }

        public function modificar($id) 
        {
            $usuarios = new Usuarios_model();

            $data["id"] = $id;
            $data["usuarios"] = $usuarios->get_usuario($id);
            $data["titulo"] = "Usuarios";
            require_once "Vista/Usuarios/ModificarUsuarios.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id']; 
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $usuarios = new Usuarios_model();
            $usuarios->modificar($id, $nombre, $usuario, $correo, $contrasena);
            $data["titulo"] = "Usuarios";
            $this->index();
        }

        public function eliminar($id) 
        {
            $usuarios = new Usuarios_model();
            $usuarios->eliminar($id);
            $data["titulo"] = "Usuarios";
            $this->index();
        }
    }
?>