<?php
    class Servicios_model {
        private $db;
        private $servicios;

        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->servicios = array();
        }

        public function get_servicios()
        {
            $sql = "SELECT * FROM servicios";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
            {
                $this->servicios[] = $row;
            }
            return $this->servicios;
        }

        public function insertar($nombre) 
        {
            $resultado = $this->db->query("INSERT INTO servicios (Nombre) VALUES ('$nombre')");
        }

        public function modificar($id, $nombre)
        {
            $resultado = $this->db->query("UPDATE servicios SET Nombre='$nombre' WHERE Id_servicio = '$id'");
        }

        public function get_servicio($id)
        {
            $sql = "SELECT * FROM servicios WHERE Id_servicio='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id)
        {
            $resultado = $this->db->query("DELETE FROM servicios WHERE Id_servicio = '$id'");
        }
    }
?>