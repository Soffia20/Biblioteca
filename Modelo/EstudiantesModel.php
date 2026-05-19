<?php
    class Estudiantes_model {
        // Variable Private porque solo se utilizara en esta clase
        private $db;
        private $estudiantes;

        // Metodo constructor, se ejecuta cuando realizes una instancia de la clase, no es necesario llamar un metodo o funcion automaticamente se va realizar 
        public function __construct()
        {
            // Mandas a llamar la clase conectar(database.php) junto con el metodo conexion
            $this->db = Conectar::conexion();
            // Arreglo
            $this->estudiantes = array();
        }

        // Ayuda a cargar los datos de la tabla de estudiantes
        public function get_estudiantes()
        {
            // variable sql,resultado
            $sql = "SELECT estudiantes.*, carreras.Nombre AS Carrera FROM estudiantes INNER JOIN carreras ON carreras.Id_carrera = estudiantes.Carrera;";
            // llama a la variable db, que tiene la conexion a la bd, se nombra a la funcion query y envia sql
            $resultado = $this->db->query($sql);
            // se extrae mediante un while, row variable
            while($row = $resultado->fetch_assoc())
            {
                // Se pasan todos los resultados, se agrega en cada indice todo una fila, hasta terminar con todos los datos de la tabla
                $this->estudiantes[] = $row;
            }
            // despues de la consulta haces un return
            return $this->estudiantes;
        }

        // Insertar Estudiante, recibe datos por eso agregamos datos dentro del parentesis
        public function insertar($matricula, $nombre, $grado, $seccion, $genero, $carrera, $contacto) 
        {
            // Aqui se hace directo, el de get_estudiantes se hizo por separado
            $resultado = $this->db->query("INSERT INTO estudiantes (Matricula, Nombre, Grado, Seccion, Genero, Carrera, Contacto) VALUES ('$matricula', '$nombre', '$grado', '$seccion', '$genero', '$carrera', '$contacto')");

        }
        public function modificar($id, $matricula, $nombre, $grado, $seccion, $genero, $carrera, $contacto)
        {
            $resultado = $this->db->query("UPDATE estudiantes SET Matricula='$matricula', Nombre='$nombre', Grado='$grado', Seccion='$seccion', Genero='$genero', Carrera='$carrera', Contacto='$contacto' WHERE Id_estudiante = '$id'");
        }

        // Para que los valores que quiera modificar se vean en el formulario
        public function get_estudiante($id)
        {
            // Limit es para que una vez que encuente el pirmer valor lo envie
            $sql = "SELECT * FROM estudiantes WHERE Id_estudiante='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id)
        {
            $resultado = $this->db->query("DELETE FROM estudiantes WHERE Id_estudiante = '$id'");
        }

        public function buscar_estudiantes_por_nombre($nombre)
        {
            $consulta = $this->db->query("SELECT Id_estudiante, Nombre FROM estudiantes WHERE Nombre LIKE '%$nombre%' LIMIT 10");
            return $consulta->fetch_all(MYSQLI_ASSOC);
        }

    }
?>