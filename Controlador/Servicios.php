<?php
    class ServiciosController
    {

        public function __construct()
        {
            if(!isset($_SESSION['usuario_id'])){

                header("Location:index.php?c=InicioSesion&a=index");
                exit();
            }

            require_once "Modelo/ServiciosModel.php";
        }

        public function index(){
            $servicios = new Servicios_model();
            $data["titulo"] = "Servicios";
            $data["servicios"] = $servicios->get_servicios();

            require_once "Vista/Servicios/Servicios.php";
        }

        public function insertar() 
        {
            $data["titulo"] = "Servicios";
            require_once "Vista/Servicios/InsertarServicios.php";
        }

        public function guardar() 
        {
            $nombre = $_POST['nombre'];

            $servicios = new Servicios_model();
            $servicios->insertar($nombre);
            
            $data["titulo"] = "Servicios";
            $this->index();
        }

        public function modificar($id) 
        {
            $servicios = new Servicios_model();

            $data["id"] = $id;
            $data["servicios"] = $servicios->get_servicio($id);
            $data["titulo"] = "Servicios";
            require_once "Vista/Servicios/ModificarServicios.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $servicios = new Servicios_model();
            $servicios->modificar($id, $nombre);
            $data["titulo"] = "Servicios";
            $this->index();
        }

        public function eliminar($id) 
        {
            $servicios = new Servicios_model();
            $servicios->eliminar($id);
            $data["titulo"] = "servicios";
            $this->index();
        }
    }
?>