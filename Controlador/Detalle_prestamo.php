<!-- Une modelo y vista -->
<?php

    class Detalle_prestamoController
    {

        public function __construct()
        {
            require_once "Modelo/Detalle_prestamoModel.php";
            require_once "Modelo/PrestamosModel.php";
        }

        public function index(){
            // LLama al modelo(archivo)
            require_once "Modelo/Detalle_prestamoModel.php";
            // Creamos un objeto del modelo llamandolo estudiantes, del modelo tomas el nombre de la clase(Estudiantes_model)  
            $detalle = new Detalle_prestamo_model();
            // LLama la funcion/metodo llamado get_estu... muestra los datos de estudiantes
            // Variable llamada data, que es un arreglo por eso los corchetes
            $data["titulo"] = "Detalle_prestamo";
            $data["detalle_prestamo"] = $detalle->get_detalle();

            // Carga la vista(archivo) para enviar data
            require_once "Vista/Detalle_prestamo/Detalle_prestamo.php";
        } 
        public function insertar() 
        {
            $prestamosModel = new Prestamos_model(); // Asegúrate de haber incluido el archivo o hecho autoload
            $data["prestamos"] = $prestamosModel->getPrestamosConEstudiantes(); // Aquí traes los datos
            $data["titulo"] = "Detalle_prestamo";
            require_once "Vista/Detalle_prestamo/InsertarDetalle_prestamo.php";
        }

        public function guardar() 
        {
            session_start();

            $prestamo = $_POST['prestamo'];
            $libro = $_POST['libro'];
            $cantidad = $_POST['cantidad'];

            $detalle = new Detalle_prestamo_model();
            $resultado = $detalle->insertar($prestamo, $libro, $cantidad);

            if ($resultado) {
                $_SESSION['mensaje'] = "¡Registro realizado correctamente!";
            } else {
                $_SESSION['mensaje'] = "Error al registrar el estudiante.";
            }
            
            header("Location: index.php?c=detalle_prestamo&a=index"); 
            exit;
        }

        public function modificar($id) 
        {
            $detalle = new Detalle_prestamo_model();
            $prestamos = new Prestamos_model();

            $data["id"] = $id;
            $data["detalle_prestamo"] = $detalle->get_detalles($id);
            $data["prestamos"] = $prestamos->getPrestamosConEstudiantes();
            $data["titulo"] = "Detalle_prestamo";
            require_once "Vista/Detalle_prestamo/ModificarDetalle_prestamo.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id']; 
            $prestamo = $_POST['prestamo'];
            $libro = $_POST['libro'];
            $cantidad = $_POST['cantidad'];

            $detalle = new Detalle_prestamo_model();
            $detalle->modificar($id, $prestamo, $libro, $cantidad);
            
            session_start();
            $_SESSION['mensaje'] = "La información del detalle préstamo se actualizó correctamente.";

            header("Location: index.php?c=detalle_prestamo&a=index");
            exit();
        }

        public function eliminar($id) 
        {
            $detalle = new Detalle_prestamo_model();
            $detalle->eliminar($id);
            $data["titulo"] = "Detalle_prestamo";
            $this->index();
        }

        public function crear()
        {
            $prestamos = new Prestamos_model();
            $data["prestamos"] = $prestamos->getPrestamosConEstudiantes();
            require_once "Vista/Detalle_prestamo/ModificarDetalle_prestamo.php";
        }
    }
?>