<?php 

    class InicioController
    {
        public function __construct()
        {
            require_once "Modelo/InicioModel.php";
        }
        public function index()
        {
            require_once "Vista/Vista_Inicial/Inicio.php";
        }
    }
?>