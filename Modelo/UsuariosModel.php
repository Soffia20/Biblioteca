<?php
    class Usuarios_model {
        // Variable Private porque solo se utilizara en esta clase
        private $db;
        private $usuarios;

        // Metodo constructor, se ejecuta cuando realizes una instancia de la clase, no es necesario llamar un metodo o funcion automaticamente se va realizar 
        public function __construct()
        {
            // Mandas a llamar la clase conectar(database.php) junto con el metodo conexion
            $this->db = Conectar::conexion();
            // Arreglo
            $this->usuarios = array();
        }

        // Ayuda a cargar los datos de la tabla de carreras
        public function get_usuarios()
        {
            // variable sql,resultado
            $sql = "SELECT * FROM usuarios";
            // llama a la variable db, que tiene la conexion a la bd, se nombra a la funcion query y envia sql
            $resultado = $this->db->query($sql);
            // se extrae mediante un while, row variable
            while($row = $resultado->fetch_assoc())
            {
                // Se pasan todos los resultados, se agrega en cada indice todo una fila, hasta terminar con todos los datos de la tabla
                $this->usuarios[] = $row;
            }
            // despues de la consulta haces un return
            return $this->usuarios;
        }

        // Insertar Estudiante, recibe datos por eso agregamos datos dentro del parentesis
        public function insertar($nombre, $usuario, $correo, $contrasena) 
        {
            // Aqui se hace directo, el de get_estudiantes se hizo por separado
            $resultado = $this->db->query("INSERT INTO usuarios (Nombre, Usuario, Correo, Contrasena) VALUES ('$nombre','$usuario','$correo','$contrasena')");
            return $resultado;
        }
        public function modificar($id, $nombre, $usuario, $correo, $contrasena)
        {
            $resultado = $this->db->query("UPDATE usuarios SET Nombre='$nombre', Usuario='$usuario', Correo='$correo', Contrasena='$contrasena' WHERE Id_usuario = '$id'");
        }

        // Para que los valores que quiera modificar se vean en el formulario
        public function get_usuario($id)
        {
            // Limit es para que una vez que encuente el pirmer valor lo envie
            $sql = "SELECT * FROM usuarios WHERE Id_usuario='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id)
        {
            $resultado = $this->db->query("DELETE FROM usuarios WHERE Id_usuario = '$id'");
        }

        public function buscar_usuarios_por_nombre($nombre)
        {
            $consulta = $this->db->prepare("SELECT * FROM usuarios WHERE Nombre LIKE ?");
            $nombre_param = "%" . $nombre . "%";
            $consulta->bind_param("s", $nombre_param);
            $consulta->execute();
            $resultado = $consulta->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        public function verificarCredenciales($correo, $contrasena) {
            $sql = "SELECT * FROM usuarios WHERE Correo = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($usuario = $resultado->fetch_assoc()) {
                if ($contrasena === $usuario['Contrasena']) {
                    return $usuario;
                }
            }

            return false;
        }

    }
?>