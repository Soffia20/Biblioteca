<?php
    class Detalle_prestamo_model {
        // Variable Private porque solo se utilizara en esta clase
        private $db;
        private $detalle;

        // Metodo constructor, se ejecuta cuando realizes una instancia de la clase, no es necesario llamar un metodo o funcion automaticamente se va realizar 
        public function __construct()
        {
            // Mandas a llamar la clase conectar(database.php) junto con el metodo conexion
            $this->db = Conectar::conexion();
            // Arreglo
            $this->detalle = array();
        }

        // Ayuda a cargar los datos de la tabla de carreras
        public function get_detalle()
        {
            // variable sql,resultado
            $sql = "SELECT * FROM detalle_prestamos";
            // llama a la variable db, que tiene la conexion a la bd, se nombra a la funcion query y envia sql
            $resultado = $this->db->query($sql);
            // se extrae mediante un while, row variable
            while($row = $resultado->fetch_assoc())
            {
                // Se pasan todos los resultados, se agrega en cada indice todo una fila, hasta terminar con todos los datos de la tabla
                $this->detalle[] = $row;
            }
            // despues de la consulta haces un return
            return $this->detalle;
        }

        // Insertar Estudiante, recibe datos por eso agregamos datos dentro del parentesis
        public function insertar($prestamo, $libro, $cantidad) 
        {
            // Aqui se hace directo, el de get_estudiantes se hizo por separado
            $resultado = $this->db->query("INSERT INTO detalle_prestamos (Prestamo, Libro, Cantidad) VALUES ('$prestamo','$libro','$cantidad')");

        }
        public function modificar($id, $prestamo, $libro, $cantidad)
        {
            $resultado = $this->db->query("UPDATE detalle_prestamos SET Prestamo='$prestamo', Libro='$libro', Cantidad='$cantidad' WHERE Id_detalle_prestamo = '$id'");
        }

        // Para que los valores que quiera modificar se vean en el formulario
        public function get_detalles($id)
        {
            // Limit es para que una vez que encuente el pirmer valor lo envie
            $sql = "SELECT * FROM detalle_prestamos WHERE Id_detalle_prestamo='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id)
        {
            $resultado = $this->db->query("DELETE FROM detalle_prestamos WHERE Id_detalle_prestamo = '$id'");
        }
    }
?>