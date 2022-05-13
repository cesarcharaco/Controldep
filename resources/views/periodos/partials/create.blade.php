<div class="modal fade" id="create_periodos">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="nav-icon fa fa-shopping-basket"></i> Crear Periodo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="POST" data-parsley-validate  name="periodoForm" id="periodoForm">
        <div class="modal-body">
          <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
          <div class="row">
            <div class="col-sm-10">
              <div class="form-group">
                <label for="periodo">Periodo <b style="color: red;">*</b></label>
                <input type="text" name="periodo" id="periodo" class="form-control" required="required" placeholder="Ingrese el periodo" onkeyup="this.value = this.value.toUpperCase();">
              </div>
              @error('periodo')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-sm-10">
              <div class="form-group">
                <label for="status">Status <b style="color: red;">*</b></label>
                <select name="status" id="status" class="form-control select2" title="Seleccione el status del periodo">
                  <option value="Activos">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
              @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
          <button type="submit" id="SubmitCreatePeriodo" class="btn btn-info"><i class="fa fa-save"></i> Registrar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->