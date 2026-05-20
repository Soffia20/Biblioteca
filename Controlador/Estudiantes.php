<!-- Une modelo y vista -->
<?php

    class EstudiantesController
    {

        public function __construct()
        {
            if(!isset($_SESSION['usuario_id'])){

                header("Location:index.php?c=InicioSesion&a=index");
                exit();
            }

            require_once "Modelo/EstudiantesModel.php";
        }

        public function index(){
            // Creamos un objeto del modelo llamandolo estudiantes, del modelo tomas el nombre de la clase(Estudiantes_model)  
            $estudiantes = new Estudiantes_model();
            // LLama la funcion/metodo llamado get_estu... muestra los datos de estudiantes
            // Variable llamada data, que es un arreglo por eso los corchetes
            $data["titulo"] = "Estudiantes";
            // obtener los datos de estudiantes
            $data["estudiantes"] = $estudiantes->get_estudiantes();

            // Carga la vista(archivo) para enviar data
            require_once "Vista/Estudiantes/Estudiantes.php";
        }

        public function insertar() 
        {
            $data["titulo"] = "Estudiantes";
            require_once "Vista/Estudiantes/InsertarEstudiantes.php";
        }

        public function guardar() 
        {
            $matricula = $_POST['matricula'];
            $nombre = $_POST['nombre'];
            $grado = $_POST['grado'];
            $seccion = $_POST['seccion'];
            $genero = $_POST['genero'];
            $carrera = $_POST['carrera'];
            $contacto = $_POST['contacto'];

            $estudiantes = new Estudiantes_model();
            $estudiantes->insertar($matricula, $nombre, $grado, $seccion, $genero, $carrera, $contacto);
            
            $data["titulo"] = "Estudiantes";
            $this->index();
        }

        public function modificar($id) 
        {
            $estudiantes = new Estudiantes_model();

            $data["id"] = $id;
            $data["estudiantes"] = $estudiantes->get_estudiante($id);
            $data["titulo"] = "Estudiantes";
            require_once "Vista/Estudiantes/ModificarEstudiantes.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id'];
            $matricula = $_POST['matricula'];
            $nombre = $_POST['nombre'];
            $grado = $_POST['grado'];
            $seccion = $_POST['seccion'];
            $genero = $_POST['genero'];
            $carrera = $_POST['carrera'];
            $contacto = $_POST['contacto'];

            $estudiantes = new Estudiantes_model();
            $estudiantes->modificar($id, $matricula, $nombre, $grado, $seccion, $genero, $carrera, $contacto);
            $data["titulo"] = "Estudiantes";
            $this->index();
        }

        public function eliminar($id) 
        {
            $estudiantes = new Estudiantes_model();
            $estudiantes->eliminar($id);
            $data["titulo"] = "Estudiantes";
            $this->index();
        }

        public function buscar()
        {
            require_once "Modelo/EstudiantesModel.php";
            $estudiantesModel = new Estudiantes_model();

            $nombre = $_POST['nombre'];
            $estudiantes = $estudiantesModel->buscar_estudiantes_por_nombre($nombre);

            foreach ($estudiantes as $est) {
                echo '<li class="sugerencia-item" data-id="' . $est['Id_estudiante'] . '">' . $est['Nombre'] . '</li>';
            }
        }

    }
?>