<!-- Une modelo y vista -->
<?php

    class CarrerasController
    {

        public function __construct()
        {
            if(!isset($_SESSION['usuario_id'])){

                header("Location:index.php?c=InicioSesion&a=index");
                exit();
            }

            require_once "Modelo/CarrerasModel.php";
        }

        public function index(){
            $carreras = new Carreras_model();

            $data["titulo"] = "Carreras";
            $data["carreras"] = $carreras->get_carreras();

            require_once "Vista/Carreras/Carreras.php";
        } 
        public function insertar() 
        {
            $data["titulo"] = "Carreras";
            require_once "Vista/Carreras/InsertarCarreras.php";
        }

        public function guardar() 
        {
            $nombre = $_POST['nombre'];

            $carreras = new Carreras_model();
            $carreras->insertar($nombre);
            
            $data["titulo"] = "Carreras";
            $this->index();
        }

        public function modificar($id) 
        {
            $carreras = new Carreras_model();

            $data["id"] = $id;
            $data["carreras"] = $carreras->get_carrera($id);
            $data["titulo"] = "Carreras";
            require_once "Vista/Carreras/ModificarCarreras.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id']; 
            $nombre = $_POST['nombre'];

            $carreras = new Carreras_model();
            $carreras->modificar($id, $nombre);
            $data["titulo"] = "Carreras";
            $this->index();
        }

        public function eliminar($id) 
        {
            $carreras = new Carreras_model();
            $carreras->eliminar($id);
            $data["titulo"] = "Carreras";
            $this->index();
        }
    }
?>