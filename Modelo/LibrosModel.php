<?php
    class Libros_model {
        private $db;
        private $libros;

        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->libros = array();
        }

        public function get_libros()
        {
            $sql = "SELECT * FROM libros";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
            {
                $this->libros[] = $row;
            }
            return $this->libros;
        }

        public function insertar($titulo, $fecha_edi, $autores, $res_cus, $dep_res, $estado, $tipo ,$editora, $ISBN, $area, $cantidad) 
        {
            $resultado = $this->db->query("INSERT INTO libros (Titulo, Fecha_edicion, Autores, Responsable_custodia, Departamento_responsable, Estado, Tipo, Editora, ISBN, Area, Cantidad) VALUES ('$titulo', '$fecha_edi' , '$autores' , '$res_cus' , '$dep_res', '$estado' , '$tipo' , '$editora' , '$ISBN', '$area' , '$cantidad')");
            return $resultado;
        }		

        public function modificar($id, $titulo, $fecha_edi, $autores, $res_cus, $dep_res, $estado, $tipo ,$editora, $ISBN, $area, $cantidad)
        {
            $resultado = $this->db->query("UPDATE libros SET Titulo='$titulo', Fecha_edicion='$fecha_edi', Autores='$autores', Responsable_custodia='$res_cus', Departamento_responsable='$dep_res', Estado='$estado', Tipo='$tipo', Editora='$editora', ISBN='$ISBN', Area='$area', Cantidad='$cantidad' WHERE Id_libro = '$id'");
           
        }

        public function get_libro($id)
        {
            $sql = "SELECT * FROM libros WHERE Id_libro='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id) 
        {
            try {
                return $this->db->query("DELETE FROM libros WHERE Id_libro = '$id'");
            } catch (Exception $e) {
                $mensaje = $e->getMessage();

                if (strpos($mensaje, 'libros') !== false) {
                    return 'libro';
                } else {
                    return 'otro';
                }
            }
        }

        public function buscar_libros_por_nombre($titulo)
        {
            $consulta = $this->db->query("SELECT Id_Libro, Titulo FROM libros WHERE Titulo LIKE '%$titulo%' LIMIT 10");
            return $consulta->fetch_all(MYSQLI_ASSOC);
        }

        public function buscar_libros($termino)
        {
            $consulta = $this->db->prepare("
                SELECT * FROM libros 
                WHERE 
                    Titulo LIKE ? OR 
                    Autores LIKE ? OR 
                    Area LIKE ? 
            ");
            
            $param = "%" . $termino . "%";
            $consulta->bind_param("sss", $param, $param, $param);
            $consulta->execute();
            $resultado = $consulta->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        public function obtenerLibroPorId($id) {
            $sql = "SELECT * FROM libros WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        }

        public function actualizarCantidad($id, $nuevaCantidad) {
            $sql = "UPDATE libros SET cantidad_disponible = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$nuevaCantidad, $id]);
        }

    }
?>