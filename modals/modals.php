<!-- MODAL DE DESEMBOLSOS -->
<div class="modal fade" id="modalEmpleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header  ">
        <h5 class="modal-title" id="exampleModalLabel">Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container"> 
          <div class="row">
            <div class="col-4">
                <div class="form-group">
                  <label for="claveEmpleado">Clave</label>
                  <input class="form-control" id="claveEmpleado"   placeholder="0" value='0' readonly=""> 
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                  <label for="nombreEmpleado">Nombre Empleado</label>
                  <input onkeypress=" return soloLetras(event)" class="form-control" id="nombreEmpleado"   placeholder="Nombre de Empleado"    > 
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="form-group">
                  <label for="apPaterno">Apellido Paterno</label>
                  <input onkeypress=" return soloLetras(event)" class="form-control" id="apPaterno"   placeholder="Apellido Paterno"  > 
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="form-group">
                  <label for="apMaterno">Apellido Materno</label>
                  <input onkeypress=" return soloLetras(event)" class="form-control" id="apMaterno"   placeholder="Apellido Materno"  > 
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="form-group">
                  <label for="fechNac">Fecha Nacimiento</label>
                  <input class="form-control" id="fechNac"    type="date"  > 
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="form-group">
                  <label for="departamento">Departamento</label>
                  <select id="departamento" class="custom-select">
                      <option value="0">Seleccione un Departamento</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="form-group">
                  <label for="sueldo">Sueldo</label> 
                  <input class="form-control" id="sueldo" onkeypress="return soloNumeros(event)"   placeholder="$ 0.00"  > 
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bg-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary btn-success" id="btnGuardarEmpleado">Guardar</button>
      </div>
    </div>
  </div>
</div> 