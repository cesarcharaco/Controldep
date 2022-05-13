<div class="modal fade" id="edit_asignaturas">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="nav-icon fa fa-shopping-basket"></i> Editar Asignaturas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="POST" data-parsley-validate>
        <div class="modal-body">
          <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
          <input type="hidden" name="id_asignatura" value="" id="id_asignatura_edit" placeholder="">
          <div class="row">
            <div class="col-sm-10">
              <div class="form-group">
                <label for="codigo">Código <b style="color: red;">*</b></label>
                <input type="text" name="codigo" id="codigo_edit" class="form-control" required="required" placeholder="Ingrese el código" onkeyup="this.value = this.value.toUpperCase();">
              </div>
              @error('codigo')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-sm-10">
              <div class="form-group">
                <label for="asignatura">Asignatura <b style="color: red;">*</b></label>
                <input type="text" name="asignatura" id="asignatura_edit" class="form-control" required="required" placeholder="Ingrese el asignatura" onkeyup="this.value = this.value.toUpperCase();">
              </div>
              @error('asignatura')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-sm-10">
              <div class="form-group">
                <label for="id_programa">Programa <b style="color: red;">*</b></label>
                <select name="id_programa" id="id_programa_edit" class="form-control select2" title="Seleccione el programa de la asignatura">
                  @foreach($programas as $key)
                  <option value="{{$key->id}}">{{$key->programa}}</option>
                  @endforeach
                </select>
              </div>
              @error('id_programa')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
          <button type="submit" id="SubmitEditAsignatura" class="btn btn-info"><i class="fa fa-save"></i> Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->