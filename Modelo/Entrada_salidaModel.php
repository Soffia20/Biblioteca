<?php
    class Entrada_salida_model {
        // Variable Private porque solo se utilizara en esta clase
        private $db;
        private $entrada;

        // Metodo constructor, se ejecuta cuando realizes una instancia de la clase, no es necesario llamar un metodo o funcion automaticamente se va realizar 
        public function __construct()
        {
            // Mandas a llamar la clase conectar(database.php) junto con el metodo conexion
            $this->db = Conectar::conexion();
            // Arreglo
            $this->entrada = array();
        }

        // Ayuda a cargar los datos de la tabla de carreras
        public function get_entrada()
        {
            // variable sql,resultado
            $sql = "SELECT * FROM entrada_salida";
            // llama a la variable db, que tiene la conexion a la bd, se nombra a la funcion query y envia sql
            $resultado = $this->db->query($sql);
            // se extrae mediante un while, row variable
            while($row = $resultado->fetch_assoc())
            {
                // Se pasan todos los resultados, se agrega en cada indice todo una fila, hasta terminar con todos los datos de la tabla
                $this->entrada[] = $row;
            }
            // despues de la consulta haces un return
            return $this->entrada;
        }

        // Insertar Estudiante, recibe datos por eso agregamos datos dentro del parentesis
        public function insertar($estudiante, $servicio, $fecha, $hora_entrada, $hora_salida) 
        {
            // Aqui se hace directo, el de get_estudiantes se hizo por separado
            $resultado = $this->db->query("INSERT INTO entrada_salida (Estudiante, Servicio, Fecha, Hora_entrada, Hora_salida) VALUES ('$estudiante','$servicio','$fecha','$hora_entrada','$hora_salida')");

        }
        public function modificar($id, $estudiante, $servicio, $fecha, $hora_entrada, $hora_salida)
        {
            $resultado = $this->db->query("UPDATE entrada_salida SET Estudiante='$estudiante', Servicio='$servicio', Fecha='$fecha', Hora_entrada='$hora_entrada', Hora_salida='$hora_salida' WHERE Id_entrada_salida = '$id'");
        }

        // Para que los valores que quiera modificar se vean en el formulario
        public function get_entradas($id)
        {
            // Limit es para que una vez que encuente el pirmer valor lo envie
            $sql = "SELECT * FROM entrada_salida WHERE Id_entrada_salida='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id)
        {
            $resultado = $this->db->query("DELETE FROM entrada_salida WHERE Id_entrada_salida = '$id'");
        }
    }
?>