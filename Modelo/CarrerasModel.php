<?php
    class Carreras_model {
        // Variable Private porque solo se utilizara en esta clase
        private $db;
        private $carreras;

        // Metodo constructor, se ejecuta cuando realizes una instancia de la clase, no es necesario llamar un metodo o funcion automaticamente se va realizar 
        public function __construct()
        {
            // Mandas a llamar la clase conectar(database.php) junto con el metodo conexion
            $this->db = Conectar::conexion();
            // Arreglo
            $this->carreras = array();
        }

        // Ayuda a cargar los datos de la tabla de carreras
        public function get_carreras()
        {
            // variable sql,resultado
            $sql = "SELECT * FROM carreras";
            // llama a la variable db, que tiene la conexion a la bd, se nombra a la funcion query y envia sql
            $resultado = $this->db->query($sql);
            // se extrae mediante un while, row variable
            while($row = $resultado->fetch_assoc())
            {
                // Se pasan todos los resultados, se agrega en cada indice todo una fila, hasta terminar con todos los datos de la tabla
                $this->carreras[] = $row;
            }
            // despues de la consulta haces un return
            return $this->carreras;
        }

        // Insertar Estudiante, recibe datos por eso agregamos datos dentro del parentesis
        public function insertar($nombre) 
        {
            // Aqui se hace directo, el de get_estudiantes se hizo por separado
            $resultado = $this->db->query("INSERT INTO carreras (Nombre) VALUES ('$nombre')");

        }
        public function modificar($id, $nombre)
        {
            $resultado = $this->db->query("UPDATE carreras SET Nombre='$nombre'WHERE Id_carrera = '$id'");
        }

        // Para que los valores que quiera modificar se vean en el formulario
        public function get_carrera($id)
        {
            // Limit es para que una vez que encuente el pirmer valor lo envie
            $sql = "SELECT * FROM carreras WHERE Id_carrera='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id)
        {
            $resultado = $this->db->query("DELETE FROM carreras WHERE Id_carrera = '$id'");
        }
    }
?>