<!-- Une modelo y vista -->
<?php

    class CarrerasController
    {

        public function __construct()
        {
            require_once "Modelo/CarrerasModel.php";
        }

        public function index(){
            // LLama al modelo(archivo)
            require_once "Modelo/CarrerasModel.php";
            // Creamos un objeto del modelo llamandolo estudiantes, del modelo tomas el nombre de la clase(Estudiantes_model)  
            $carreras = new Carreras_model();
            // LLama la funcion/metodo llamado get_estu... muestra los datos de estudiantes
            // Variable llamada data, que es un arreglo por eso los corchetes
            $data["titulo"] = "Carreras";
            $data["carreras"] = $carreras->get_carreras();

            // Carga la vista(archivo) para enviar data
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