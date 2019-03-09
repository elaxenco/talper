<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <title>Talper</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
     <a class="navbar-brand" href="#">Empleados</a>  
  </nav>
 
  </head>

  <body onload="cargarValores()">  
      

<div class="container mt-5 "> 
          <div class="row">
              <div class="col-8">
                <h2> Registro de Empleados</h2>
              </div>
              <div class="col-4">
                <button type="button" id="btnNuevoEmpledo" class="btn btn-primary float-right" onclick="vaciarCampos()"   data-toggle="modal" data-target="#modalEmpleados">Nuevo</button>
              </div> 
          </div>
           
</div>  

      <div class="container ">

        <div class="card-header bg-success text-white"> 
            <div class="row">
              <div class="col-md-6  mt-2">
               Lista de Empleados 
              </div>
              <div class="col-md-6 col-12"> 
                <input type="text" class="form-control col-md-12 col-12" id="b_empleado" onkeyup="buscarEmpleados(this.value)" placeholder="Buscar Empleado"  required>  
              </div>
            </div> 
          </div>
        <div class="card scroller-monitor">
          
          <div class="card-body">
              <table class="table table-sm">
                  <thead>
                    <tr> 
                      <th scope="col">Nombre Empleado</th>
                      <th scope="col">Fecha Nacimiento</th> 
                      <th scope="col">Departamento</th> 
                      <th scope="col">Sueldo</th>
                      <th scope="col">Acción</th> 
                    </tr>
                  </thead>
                  <tbody id="tb_empleados">
                    
                    
                  </tbody>
                </table>
            
          </div>
        </div>
      </div>



    
    
  </body>
   <?php   include('../modals/modals.php'); ?>
  <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>  
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script> 
  <script type="text/javascript" src="../js/js.cookie.js"></script>
  <script type="text/javascript" src="../js/ajax.js"></script>  
  <script type="text/javascript" src="../js/empleados.js"></script>  
  <script type="text/javascript" src="../js/utileria.js"></script>  
  <script type="text/javascript" src="../js/sweetalert.js"></script>

</html>
