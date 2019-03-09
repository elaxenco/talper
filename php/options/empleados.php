<?php 
	
	require_once("../class/empleado.php");
	$empleado = new Empleado();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
  			case 1: 

		 	  echo (json_encode($empleado->buscarDepartamentos())); 

		 		break; 
		 	case 2: 

		 	  echo (json_encode($empleado->registroEmpleados($_REQUEST['claveEmpleado'],$_REQUEST['nombreEmpleado'],$_REQUEST['apPaterno'],$_REQUEST['apMaterno'],$_REQUEST['fechNac'],$_REQUEST['departamento'],$_REQUEST['sueldo']))); 

		 		break; 

		 	case 3: 

		 	  echo (json_encode($empleado->cargarEmpleados())); 

		 		break; 
		 	case 4: 

		 	  echo (json_encode($empleado->cargarEmpleado($_REQUEST['claveEmpleado']))); 

		 		break; 
		 	case 5: 

		 	  echo (json_encode($empleado->cargarEmpleadoPorNombre($_REQUEST['empleado']))); 

		 		break; 
		 	case 6: 

		 	  echo (json_encode($empleado->eliminarEmpleado($_REQUEST['claveEmpleado']))); 

		 		break; 


 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>