<!-- Extrae el controlador
 Es la logica que une config/routes junto con idex para abrir las paginas No Necesitas Modificar Nada -->
<?php

    session_start();
    
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    require_once "Conexion/config.php";
    require_once "core/routes.php";
    // llamar la conexion, database.php
    require_once "Conexion/database.php";
    // Llama al controlador
    // require_once "Controlador/Estudiantes.php";
    require_once "Controlador/Inicio.php";

    // Funciona para abrir todos las paginas, como rutas
    // Si existe el controlador
    if(isset($_GET['c']))
	{
		// cargalo
		$controlador = cargarControlador($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccion($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccion($controlador, $_GET['a']);
			}
			} else {
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}
		
	} 
    // si no la predefinida
    else 
    {
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}

    // Creamos una instancia de la clase controlador, de forma estatica(solo abre una pagina estatica)
    // $control = new EstudiantesController();
    // $control->index();


?>
