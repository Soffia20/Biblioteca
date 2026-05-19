<!-- Une modelo y vista -->
<?php

    class Entrada_salidaController
    {

        public function __construct()
        {
            require_once "Modelo/Entrada_salidaModel.php";
        }

        public function index(){
            // LLama al modelo(archivo)
            require_once "Modelo/Entrada_salidaModel.php";
            // Creamos un objeto del modelo llamandolo estudiantes, del modelo tomas el nombre de la clase(Estudiantes_model)  
            $entrada = new Entrada_salida_model();
            // LLama la funcion/metodo llamado get_estu... muestra los datos de estudiantes
            // Variable llamada data, que es un arreglo por eso los corchetes
            $data["titulo"] = "Entrada_salida";
            $data["entrada_salida"] = $entrada->get_entrada();

            // Carga la vista(archivo) para enviar data
            require_once "Vista/Entrada_salida/Entrada_salida.php";
        } 
        public function insertar() 
        {
            $data["titulo"] = "Entrada_salida";
            require_once "Vista/Entrada_salida/InsertarEntrada_salida.php";
        }

        public function guardar() 
        {
            $estudiante = $_POST['estudiante'];
            $servicio = $_POST['servicio'];
            $fecha = $_POST['fecha'];
            $hora_entrada = $_POST['hora_entrada'];
            $hora_salida = $_POST['hora_salida'];

            $entrada = new Entrada_salida_model();
            $entrada->insertar($estudiante, $servicio, $fecha, $hora_entrada, $hora_salida);
            
            $data["titulo"] = "Entrada_salida";
            $this->index();
        }

        public function modificar($id) 
        {
            $entrada = new Entrada_salida_model();

            $data["id"] = $id;
            $data["entrada_salida"] = $entrada->get_entradas($id);
            $data["titulo"] = "Entrada_salida";
            require_once "Vista/Entrada_salida/ModificarEntrada_salida.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id']; 
            $estudiante = $_POST['estudiante'];
            $servicio = $_POST['servicio'];
            $fecha = $_POST['fecha'];
            $hora_entrada = $_POST['hora_entrada'];
            $hora_salida = $_POST['hora_salida'];

            $entrada = new Entrada_salida_model();
            $entrada->modificar($id, $estudiante, $servicio, $fecha, $hora_entrada, $hora_salida);
            $data["titulo"] = "Entrada_salida";
            $this->index();
        }

        public function eliminar($id) 
        {
            $entrada = new Entrada_salida_model();
            $entrada->eliminar($id);
            $data["titulo"] = "Entrada_salida";
            $this->index();
        }
    }
?>