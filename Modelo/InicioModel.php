<?php
    class Inicio_model {
        private $db;
        private $index;

        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->index = array();
        }
    }
?>