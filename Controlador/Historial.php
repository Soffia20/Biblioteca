<?php
    class HistorialController
    {
        public function __construct()
        {
            if(!isset($_SESSION['usuario_id'])){

                header("Location:index.php?c=InicioSesion&a=index");
                exit();
            }

            require_once "Modelo/HistorialModel.php";
            require_once "Modelo/PrestamosModel.php";
        }

        public function index(){
            $historial = new Historial_model();

            // Verifica si se está enviando un valor de búsqueda
            $busqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : null;

            $data["titulo"] = "Historial de Prestamos";

            if ($busqueda) {
                $data["historial"] = $historial->buscar_historial($busqueda);
            } else {
                $data["historial"] = $historial->get_historial();
            }

            require_once "Vista/Historial/Historial.php";
        }

        public function insertar() 
        {
            $prestamosModel = new Prestamos_model(); // Asegúrate de haber incluido el archivo o hecho autoload
            $data["titulo"] = "Historial de Prestamos";
            $data["prestamos"] = $prestamosModel->getPrestamosConEstudiantes(); // Aquí traes los datos

            require_once "Vista/Historial/InsertarHistorial.php";
        }

        public function guardar() 
        {
            $prestamo = $_POST['prestamo'];
            $descripcion = $_POST['descripcion'];
            $estado = $_POST['estado'];

            $historial = new Historial_model();
            $historial->insertar($prestamo, $descripcion, $estado);
            
            $data["titulo"] = "Historial de prestamos";
            $this->index();
        }

        public function modificar($id) 
        {
            $historial = new Historial_model();
            $prestamos = new Prestamos_model();

            $data["titulo"] = "Historial de prestamos";
            $data["id"] = $id;
            $data["historial_prestamos"] = $historial->get_historials($id);
            $data["prestamos"] = $prestamos->getPrestamosConEstudiantes();

            require_once "Vista/Historial/ModificarHistorial.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id'];
            $prestamo = $_POST['prestamo'];
            $descripcion = $_POST['descripcion'];
            $fecha = $_POST['fecha'];
            $estado = $_POST['estado'];

            $historial = new Historial_model();
            $historial->modificar($id, $prestamo, $descripcion, $fecha, $estado);
            $data["titulo"] = "Historial de prestamos";
            $this->index();
        }

        public function eliminar($id) 
        {
            $historial = new Historial_model();
            $historial->eliminar($id);
            $data["titulo"] = "Historial de prestamos";
            $this->index();
        }

        public function crear()
        {
            $prestamos = new Prestamos_model();
            $data["prestamos"] = $prestamos->getPrestamosConEstudiantes();
            require_once "Vista/Historial/InsertarHistorial.php";
        }
    }

?>