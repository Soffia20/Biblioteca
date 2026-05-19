<?php
    class Historial_model {
        private $db;
        private $historial;

        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->historial = array();
        }

        public function get_historial()
        {
            $sql = "SELECT * FROM historial_prestamos";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
            {
                $this->historial[] = $row;
            }
            return $this->historial;
        }

        public function insertar($prestamo, $descripcion, $estado) 
        {
            $resultado = $this->db->query("INSERT INTO historial_prestamos (Prestamo, Descripcion, Fecha, Estado) VALUES ('$prestamo', '$descripcion' , NOW(), '$estado')");
        }

        public function modificar($id, $prestamo, $descripcion, $fecha, $estado)
        {
            $resultado = $this->db->query("UPDATE historial_prestamos SET Prestamo='$prestamo', Descripcion='$descripcion', Fecha='$fecha', Estado='$estado' WHERE Id_historial = '$id'");
        }

        public function get_historials($id)
        {
            $sql = "SELECT * FROM historial_prestamos WHERE Id_historial='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id)
        {
            $resultado = $this->db->query("DELETE FROM historial_prestamos WHERE Id_historial = '$id'");
        }

        public function buscar_historial($termino)
        {
            $consulta = $this->db->prepare("
                SELECT * FROM historial_prestamos 
                WHERE 
                    Prestamo LIKE ? OR 
                    Descripcion LIKE ? OR 
                    Fecha LIKE ? OR 
                    Estado LIKE ? 
            ");
            
            $param = "%" . $termino . "%";
            $consulta->bind_param("ssss", $param, $param, $param, $param);
            $consulta->execute();
            $resultado = $consulta->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }
?>