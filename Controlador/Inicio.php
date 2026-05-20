<?php 

class InicioController
{
    public function __construct()
    {
        if(!isset($_SESSION['usuario_id'])){

            header("Location:index.php?c=InicioSesion&a=index");
            exit();
        }

        require_once "Modelo/InicioModel.php";
    }

    public function index()
    {
        require_once "Vista/Vista_Inicial/Inicio.php";
    }
}
?>