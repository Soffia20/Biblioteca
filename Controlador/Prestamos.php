<?php
    class PrestamosController
    {
        public function __construct()
        {
            require_once "Modelo/PrestamosModel.php";
        }

        public function index(){
            require_once "Modelo/PrestamosModel.php";
            $prestamos = new Prestamos_model();
            $data["titulo"] = "Prestamos";
            $data["prestamos"] = $prestamos->get_prestamos();

            require_once "Vista/Prestamos/Prestamos.php";
        }

        public function insertar() 
        {
            // Para llamar el lugar de donde se va seleccionar
            require_once "Modelo/EstudiantesModel.php";
            $estudiantesModel = new Estudiantes_model();
            // Obitiene las carreras en el select
            $data["estudiantes"] = $estudiantesModel->get_estudiantes();

            $data["titulo"] = "Prestamos";
            require_once "Vista/Prestamos/InsertarPrestamos.php";
        }

        public function guardar() 
        {
            $estudiante = $_POST['estudiante'];
            $fecha_pre = $_POST['fecha_pre'];
            $fecha_ent = $_POST['fecha_ent'];
            $fecha_dev = $_POST['fecha_dev'];
            $estado = $_POST['estado'];

            $prestamos = new Prestamos_model();
            $prestamos->insertar($estudiante, $fecha_pre, $fecha_ent, $fecha_dev, $estado);
            
            $data["titulo"] = "Prestamos";
            $this->index();
        }

        public function modificar($id) 
        {
            $prestamos = new Prestamos_model();

            $data["id"] = $id;
            $data["prestamos"] = $prestamos->get_prestamo($id);
            $data["titulo"] = "Prestamos";
            require_once "Vista/Prestamos/ModificarPrestamos.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id'];
            $estudiante = $_POST['estudiante'];
            $fecha_pre = $_POST['fecha_pre'];
            $fecha_ent = $_POST['fecha_ent'];
            $fecha_dev = $_POST['fecha_dev'];
            $estado = $_POST['estado'];

            $prestamos = new Prestamos_model();
            $prestamos->modificar($id, $estudiante, $fecha_pre, $fecha_ent, $fecha_dev, $estado);
            $data["titulo"] = "Prestamos";
            $this->index();
        }

        // public function eliminar($id) 
        // {
        //     $prestamos = new Prestamos_model();
        //     $prestamos->eliminar($id);
        //     $data["titulo"] = "Prestamos";
        //     $this->index();
        // }

        // public function eliminar($id)
        // {
        //     $prestamos = new Prestamos_model();
        //     $resultado = $prestamos->eliminar($id);

        //     if ($resultado === false) {
        //         // Redirige con mensaje de error
        //         header("Location: index.php?c=Prestamos&a=index&error=1");
        //     } else {
        //         header("Location: index.php?c=Prestamos&a=index");
        //     }
        // }

        public function eliminar($id)
        {
            $prestamos = new Prestamos_model();
            $resultado = $prestamos->eliminar($id);

            if ($resultado === true) {
                header("Location: index.php?c=Prestamos&a=index");
            } else {
                // Redirige con el tipo de error como parámetro
                header("Location: index.php?c=Prestamos&a=index&error=$resultado");
            }
        }

    }
?>