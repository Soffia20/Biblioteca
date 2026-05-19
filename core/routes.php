<!-- procesa los controladores(es como el nucleo del modelo) 
Crea la logica al momento de abrir los controladores y las acciones de estos-->
<?php
// variable controlador donde recibe
    function cargarControlador($controlador) 
    {
        // seguir estructura para evitar errores(CONTROLLER/como en el controlador: (EstudiantesController)/ ucwords funciona para que la primera ltra sea mayuscula y las demas minuscula
        $nombreControlador = ucwords($controlador)."Controller";
        // Controlador es por el nombre de la carpeta
        $archivoControlador = 'Controlador/'.ucwords($controlador).'.php';

        // Validacion para saber si la clase existe correctamente
        // si no
        if(!is_file($archivoControlador)){
            $archivoControlador = 'Controlador/'.CONTROLADOR_PRINCIPAL.'.php';
        }

        // para saber que archivo no esta cargando
        // echo $archivoControlador;
        // falta explicacion
        require_once $archivoControlador;
        $control = new $nombreControlador();
        return $control;
    }

	function cargarAccion($controller, $accion, $id = null){
		
		if(isset($accion) && method_exists($controller, $accion)){
			if($id == null){
				$controller->$accion();
				} else {
				$controller->$accion($id);
			}
			} else {
			$controller->ACCION_PRINCIPAL();
		}	
	}

    // 
    // function cargarAccion ($controller, $accion, $id = null) {
    //     // si obtine el get(a) accion-insertar y el metodo existe
    //     if(isset($accion) && method_exists($controller, $accion)) {
    //         if ($id == null) {
    //             $controller->$accion();
    //         } else {
    //             $controller->$accion($id);
    //         }
    //     } else {
    //         $controller->ACCION_PRINCIPAL();
    //     }
    // }
?>