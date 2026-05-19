<?php
    class Prestamos_model {
        private $db;
        private $prestamos;

        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->prestamos = array();
        }

        public function get_prestamos()
        {
            $sql = "SELECT * FROM prestamos";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
            {
                $this->prestamos[] = $row;
            }
            return $this->prestamos;
        }

        public function insertar($estudiante, $fecha_pre, $fecha_ent, $fecha_dev, $estado) 
        {
            $resultado = $this->db->query("INSERT INTO prestamos (Estudiante, Fecha_prestamo, Fecha_entrega, Fecha_devolucion, Estado) VALUES ('$estudiante', '$fecha_pre', '$fecha_ent', '$fecha_dev', '$estado')");
        }

        public function modificar($id, $estudiante, $fecha_pre, $fecha_ent, $fecha_dev, $estado)
        {
            $resultado = $this->db->query("UPDATE prestamos SET Estudiante='$estudiante', Fecha_prestamo='$fecha_pre', Fecha_entrega='$fecha_ent', Fecha_devolucion='$fecha_dev', Estado='$estado' WHERE Id_prestamo = '$id'");
        }

        public function get_prestamo($id)
        {
            $sql = "SELECT * FROM prestamos WHERE Id_prestamo='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id)
        {
            $resultado = $this->db->query("DELETE FROM prestamos WHERE Id_prestamo = '$id'");
        }
    }
?>