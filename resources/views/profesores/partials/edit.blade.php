<div class="modal fade" id="edit_profesores">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="nav-icon fa fa-shopping-basket"></i> Editar Profesor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="POST" data-parsley-validate>
        
        <div class="modal-body">
           <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
           <input type="hidden" name="id_profesor_x" value="" id="id_profesor_edit" placeholder="" />
        <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="profesor">Nombres y Apellidos<b style="color: red;">*</b></label>
                <input type="text" name="profesor" id="profesor_edit" class="form-control" required="required" placeholder="Ingrese los Nombres y Apellidos del profesor" >
              </div>
              @error('profesor')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="rut">RUT <b style="color: red;">*</b></label>
                <input type="text" name="rut" id="rut_edit" class="form-control" required="required" placeholder="Ingrese el RUT del profesor" >
              </div>
              @error('rut')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label for="dv">DV <b style="color: red;">*</b></label>
                <input type="text" name="dv" id="dv_edit" class="form-control" required="required" placeholder="Ingrese el dv del profesor" >
              </div>
              @error('dv')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="telefono">Celular <b style="color: red;">*</b></label>
                <input type="text" name="telefono" id="telefono_edit" class="form-control" required="required" placeholder="Ingrese el teléfono del profesor" >
              </div>
              @error('telefono')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="correo">Correo <b style="color: red;">*</b></label>
                <input type="email"  name="correo" id="correo_edit" class="form-control" required="required" placeholder="Ingrese el correo del profesor" >
              </div>
              @error('correo')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="username">Nombre de Usuario: <b style="color: red;">*</b></label>
                <input type="text" name="username" id="username_edit" class="form-control" required="required" placeholder="Ingrese la Nombre de Usuario del profesor">
              </div>
              @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="status">Status: <b style="color: red;">*</b></label>
                <select name="status" id="status_edit" class="form-control" required="required" title="Seleccione el status del Profesor">
                  <option value="Activo">Activo</option>
                  <option value="Suspendido">Suspendido</option>
                </select>
              </div>
              @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <small>Si desea resetear la clave: </small><input type="checkbox" name="reset_clave" id="reset_clave" value="1" title="Seleccione si desea resetear la clave" >
          </div>
        <div class="row">
          <div class="col-sm-4" id="clave_nueva" style="display: none;">
            <label for="clave">Clave Nueva</label>
            <input type="password" name="clave_nueva" id="clave" placeholder="Ej:Nombre123." class="form-control" minlength="8">
          </div>
          <div class="col-sm-4" id="clave_nueva2" style="display: none;">
            <label for="clave2">Repita la Clave</label>
            <input type="password" name="clave_nueva2" id="clave2" placeholder="Ej:Nombre123." class="form-control" minlength="8">
          </div>
        </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times"></i>Cerrar</button>
          <button type="submit" id="SubmitEditProfesor" class="btn btn-info"><i class="fa fa-save"></i>Guardar</button>
        </div>
      </form> 
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->