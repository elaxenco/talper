$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB
    //declaraciones principales
     //guardar desembolso
    $( "#btnGuardarEmpleado" ).click(function() { 
        //mostramos una advertencia para el operador
          swal({
              title:"¿Seguro de realizar el movimiento?", 
              icon: "warning",
              buttons: true,  
            })
            .then((respuesta) => {
              if (respuesta) { 
                  let claveEmpleado   = $("#claveEmpleado").val();
                  let nombreEmpleado  = $("#nombreEmpleado").val().toUpperCase();
                  let apPaterno       = $("#apPaterno").val().toUpperCase();
                  let apMaterno       = $("#apMaterno").val().toUpperCase();
                  let fechNac         = $("#fechNac").val();
                  let departamento    = $("#departamento").val();
                  let sueldo          = $("#sueldo").val();

               if(validarCamposVacios()){  
                  onRequestEmp({ opcion : 2,claveEmpleado :claveEmpleado,nombreEmpleado:nombreEmpleado,apPaterno:apPaterno, apMaterno:apMaterno,fechNac:fechNac,departamento:departamento,sueldo:sueldo },resRegistroEmpleados);
               }else{
                  swal({
                          title:"¡No puedes ingresar campos vacios!", 
                          icon: "error",
                          buttons: true,  
                   });
               }
            
                   
              } else {
                swal({
                          title:"¡Se cancelaron los movimientos", 
                          icon: "error",
                          buttons: true,  
                });
              }
            });
    });


   
}); 

///FUNCIONES
function cargarValores(){ 
  onRequestEmp({ opcion : 1  },resCargarPuestos);
  onRequestEmp({ opcion : 3  },resCargarEmpleados);
 
}

function validarCamposVacios(){
     

    if($("#nombreEmpleado").val()=='' || $("#apPaterno").val()=='' ||$("#apMaterno").val()=='' || $("#fechNac").val()=='' || $("#departamento").val()<=0 || $("#sueldo").val()<=0 ){
      return false
    }else{
      return true
    }
}

function buscarEmpleados(empleado){
 

    if(empleado.length>3){
      onRequestEmp({ opcion : 5,empleado:empleado  },resCargarEmpleados);
    }else{
        if(empleado.length==0){
           onRequestEmp({ opcion : 3  },resCargarEmpleados);
        }
    }

}

function buscarEmpleadoPorClave(claveEmpleado){
  onRequestEmp({ opcion : 4,claveEmpleado:claveEmpleado  },resCargarEmpleado);
}

function eliminarEmpleadoPorClave(claveEmpleado){
    swal({
              title:`¿Seguro de realizar eliminar a este empleado con id:${claveEmpleado}?`, 
              icon: "warning",
              buttons: true,  
            })
            .then((respuesta) => {
              if (respuesta) { 
                  onRequestEmp({ opcion : 6,claveEmpleado:claveEmpleado  },resCargarEmpleados);
                   
              } else {
                swal({
                          title:"¡Se cancelaron los movimientos correctamente!", 
                          icon: "error",
                          buttons: true,  
                });
              }
         });
}

function vaciarCampos(){
     $("#claveEmpleado").val('0');
     $("#nombreEmpleado").val('');
     $("#apPaterno").val('');
     $("#apMaterno").val('');
     $("#fechNac").val('');
     $("#departamento").val('0'); 
     $("#sueldo").val('0');
}

///RESPUESTAS

var resCargarPuestos = function(data){
    if (!data && data == null) 
            return;   
      
    let contenido = "<option value='0'>Seleccione un Departamento</option>"

    for(var i=0; i<data.length; i++){
            //generamos  codigo html y llenamos el combo
              contenido += `<option value=${data[i].puesto}>${data[i].departamento}</option> `

    }

    $("#departamento").html(contenido)
  
}

var resRegistroEmpleados = function(data){
    if (!data && data == null) 
            return;    

   switch(data[0].respuesta ){
        
        case 1: 
              swal({
                          title:"¡El empleado se registro correctamente!", 
                          icon: "success",
                          buttons: true,  
                   });

              $("#modalEmpleados").modal('hide');
          break
        case 2:
              swal({
                          title:"¡Ocurrio un error favor de verificar la informacion o contactar con un administrador!", 
                          icon: "error",
                          buttons: true,  
                   });


              $("#modalEmpleados").modal('hide');
          break
        case 3:
              
              swal({
                          title:"¡Los datos fueron actualizados correctamente!", 
                          icon: "success",
                          buttons: true,  
                   });

              $("#modalEmpleados").modal('hide');
          break 
   }

   onRequestEmp({ opcion : 3  },resCargarEmpleados);
 

}

var resCargarEmpleados= function(data){
    if (!data && data == null) 
            return;    

    console.log(data)
 
    let contenido = ""

    for(var i=0; i<data.length; i++){
            //generamos  codigo html y llenamos el combo
              contenido += `<tr><td>${data[i].Nombre} ${data[i].ApPaterno} ${data[i].ApMaterno}</td><td>${data[i].FecNac}</td><td>${data[i].Departamento}</td><td>$${data[i].Sueldo}</td>
              <td><span data-toggle="modal" data-target="#modalEmpleados"><button onclick="buscarEmpleadoPorClave(${data[i].Clave_Emp})" class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit "></i></button></span>
              <button onclick="eliminarEmpleadoPorClave(${data[i].Clave_Emp})"   class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash "></i></button> 
                               </td></tr>`

    }

    $("#tb_empleados").html(contenido);
    $('[data-toggle="tooltip"]').tooltip()
 

}

var resCargarEmpleado = function(data){
    if (!data && data == null) 
            return;   
     
     $("#claveEmpleado").val(data[0].Clave_Emp);
     $("#nombreEmpleado").val(data[0].Nombre);
     $("#apPaterno").val(data[0].ApPaterno);
     $("#apMaterno").val(data[0].ApMaterno);
     $("#fechNac").val(data[0].FecNac);
     $("#departamento").val(data[0].Departamento); 
     $("#sueldo").val(data[0].Sueldo);
 
  
}