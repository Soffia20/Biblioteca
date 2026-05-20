<?php
    class LibrosController
    {

        public function __construct()
        {
            if(!isset($_SESSION['usuario_id'])){

                header("Location:index.php?c=InicioSesion&a=index");
                exit();
            }

            require_once "Modelo/LibrosModel.php";
        }

        public function index(){
            $libros = new Libros_model();
            $data["titulo"] = "Libros";
            $data["libros"] = $libros->get_libros();

            require_once "Vista/Libros/Libros.php";
        }

        public function insertar() 
        {
            $data["titulo"] = "Libros";
            require_once "Vista/Libros/InsertarLibros.php";
        }

        public function guardar() 
        {
            $titulo = $_POST['titulo'];
            $fecha_edi = $_POST['fecha_edi'];
            $autores = $_POST['autores'];
            $res_cus = $_POST['res_cus'];
            $dep_res = $_POST['dep_res'];
            $tipo = $_POST['tipo'];
            $editora = $_POST['editora'];
            $ISBN = $_POST['ISBN'];
            $area = $_POST['area'];
            $cantidad = $_POST['cantidad'];

            $libros = new Libros_model();
            $libros->insertar($titulo, $fecha_edi, $autores, $res_cus, $dep_res, $tipo ,$editora, $ISBN, $area, $cantidad);
            
            $data["titulo"] = "Libros";
            $this->index();
        }

        public function modificar($id) 
        {
            $libros = new Libros_model();

            $data["id"] = $id;
            $data["libros"] = $libros->get_libro($id);
            $data["titulo"] = "Libros";
            require_once "Vista/Libros/ModificarLibros.php";
        }

        public function actualizar() 
        {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $fecha_edi = $_POST['fecha_edi'];
            $autores = $_POST['autores'];
            $res_cus = $_POST['res_cus'];
            $dep_res = $_POST['dep_res'];
            $tipo = $_POST['tipo'];
            $editora = $_POST['editora'];
            $ISBN = $_POST['ISBN'];
            $area = $_POST['area'];
            $cantidad = $_POST['cantidad'];

            $libros = new Libros_model();
            $libros->modificar($id, $titulo, $fecha_edi, $autores, $res_cus, $dep_res, $tipo ,$editora, $ISBN, $area, $cantidad);
            $data["titulo"] = "Libros";
            $this->index();
        }

        public function eliminar($id) 
        {
            $libros = new Libros_model();
            $libros->eliminar($id);
            $data["titulo"] = "Libros";
            $this->index();
        }

        public function buscar()
        {
            require_once "Modelo/LibrosModel.php";
            $libros = new Libros_model();

            $titulo = $_POST['titulo'];
            $libro = $libros->buscar_libros_por_nombre($titulo);

            foreach ($libro as $lib) {
                echo '<li class="sugerencia-item" data-id="' . $est['Id_libro'] . '">' . $est['Titulo'] . '</li>';
            }
        }
    }
?>