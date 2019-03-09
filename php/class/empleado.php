<?php
	
	require_once("../conexion/conexion.php");

	class Empleado extends Conectar{

				// carga de departamentos
 				public function buscarDepartamentos(){
							$res=array();
							$datos=array();
							$i=0; 

						  $sql="SELECT puesto, descripcion FROM departamentos"; 
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['puesto'] 	= $res[0]; 
								$datos[$i]['departamento'] 		= $res[1];  

								$i++;
							} 
		          		 
							return $datos;

				}

				// registro de empleados
 				public function registroEmpleados($claveEmpleado,$nombreEmpleado,$apPaterno,$apMaterno,$fechNac,$departamento,$sueldo){
							$res=array();
							$datos=array();  

						   
							if($claveEmpleado>0){
								$sql="UPDATE empleados SET Nombre='$nombreEmpleado',ApPaterno='$apPaterno',ApMaterno='$apMaterno',FecNac='$fechNac',Departamento=$departamento,Sueldo=$sueldo WHERE Clave_Emp=$claveEmpleado";    
								$resultado= mysqli_query($this->con(), $sql);  
								if($resultado){
									$datos[0]['respuesta'] 		= 3; 
								}else{
									$datos[0]['respuesta'] 		= 2; 
								}
							}else{
								$sql ="INSERT INTO empleados (Nombre,ApPaterno,ApMaterno,FecNac,Departamento,Sueldo)
												VALUES('$nombreEmpleado','$apPaterno','$apMaterno','$fechNac',$departamento,$sueldo)"; 
								$resultado= mysqli_query($this->con(), $sql); 
								if($resultado){
									$datos[0]['respuesta'] 		= 1; 
								}else{
									$datos[0]['respuesta'] 		= 2; 
								}
							}




		          		 
							return $datos;

				}
				public function cargarEmpleados(){
							$res=array();
							$datos=array();
							$i=0; 

						  $sql="SELECT Clave_Emp,Nombre,ApPaterno,ApMaterno,FecNac,d.Descripcion,Sueldo  FROM empleados
									JOIN departamentos d ON d.Puesto= empleados.Departamento ORDER BY empleados.Clave_Emp"; 
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['Clave_Emp'] 	= $res[0]; 
								$datos[$i]['Nombre'] 		= $res[1]; 
								$datos[$i]['ApPaterno'] 	= $res[2];
								$datos[$i]['ApMaterno'] 	= $res[3]; 
								$datos[$i]['FecNac'] 		= $res[4]; 
								$datos[$i]['Departamento'] 	= $res[5]; 
								$datos[$i]['Sueldo'] 		= $res[6];   

								$i++;
							} 
		          		 
							return $datos;

				}
				public function cargarEmpleado($claveEmpleado){
							$res=array();
							$datos=array();
							$i=0; 

						  $sql="SELECT Clave_Emp,Nombre,ApPaterno,ApMaterno,FecNac,Departamento,Sueldo  FROM empleados
									  WHERE Clave_Emp=$claveEmpleado"; 
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['Clave_Emp'] 	= $res[0]; 
								$datos[$i]['Nombre'] 		= $res[1]; 
								$datos[$i]['ApPaterno'] 	= $res[2];
								$datos[$i]['ApMaterno'] 	= $res[3]; 
								$datos[$i]['FecNac'] 		= $res[4]; 
								$datos[$i]['Departamento'] 	= $res[5]; 
								$datos[$i]['Sueldo'] 		= $res[6];   

								$i++;
							} 
		          		 
							return $datos;

				}
				public function cargarEmpleadoPorNombre($empleado){
							$res=array();
							$datos=array();
							$i=0; 

						  $sql="SELECT Clave_Emp,Nombre,ApPaterno,ApMaterno,FecNac,Departamento,Sueldo  FROM empleados
									  WHERE Nombre LIKE '%$empleado%' OR ApPaterno LIKE '%$empleado%' OR ApMaterno LIKE '%$empleado%'";  
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['Clave_Emp'] 	= $res[0]; 
								$datos[$i]['Nombre'] 		= $res[1]; 
								$datos[$i]['ApPaterno'] 	= $res[2];
								$datos[$i]['ApMaterno'] 	= $res[3]; 
								$datos[$i]['FecNac'] 		= $res[4]; 
								$datos[$i]['Departamento'] 	= $res[5]; 
								$datos[$i]['Sueldo'] 		= $res[6];   

								$i++;
							} 
		          		 
							return $datos;

				}

				public function eliminarEmpleado($claveEmpleado){
							$res=array();
							$datos=array();
							$i=0; 

						  $sql="DELETE FROM empleados WHERE  Clave_Emp=$claveEmpleado";  
						  $resultado= mysqli_query($this->con(), $sql); 
		          		 
		          		 $datos = $this->cargarEmpleados();
							return $datos;

				}



	}

	?>