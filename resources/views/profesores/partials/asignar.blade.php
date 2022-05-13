<div class="modal fade" id="asignar_asignatura">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="nav-icon fa fa-shopping-basket"></i> Asignar Asignatura</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="POST" data-parsley-validate name="asignarAsignaturaForm" id="asignarAsignaturaForm">
        <div class="modal-body">
          <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
          <input type="hidden" name="id_profesor" id="id_profesor">
                    <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="Programa">Programa<b style="color: red;">*</b></label>
                <select name="id_programa" id="id_programa" class="form-control select2" title="Selececcione el Programa de Estudio">
                  @foreach($programas as $key)
                    <option value="{{$key->id}}">{{$key->cod}} - {{$key->programa}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="asignatura">Asignatura <b style="color: red;">*</b></label>
                <select name="id_asignatura" id="id_asignatura" class="form-control select2" title="Selececcione la Asignatura">
                  
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="periodo">Periodo: </label>
                <select name="id_periodo" id="id_periodo" class="form-control select2" title="Selececcione el Periodo Académico">
                  @foreach($periodos as $key)
                    <option value="{{$key->id}}">{{$key->periodo}} - ({{$key->status}})</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="horas">Horas: <b style="color: red;">*</b></label>
                <input type="number" name="horas" id="horas" min="1"  class="form-control" required="required" placeholder="Ingrese las horas a asignar">
              </div>
              @error('horas')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="subseccion_tecnica">Subsección Técnica: <b style="color: red;">*</b></label>
                <input type="text" name="subseccion_tecnica" id="subseccion_tecnica" class="form-control" required="required" placeholder="Ingrese la Subsección Técnica" >
              </div>
              @error('subseccion_tecnica')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="subseccion_practica">Subsección Práctica:</label>
                <input type="text" name="subseccion_practica" id="subseccion_practica" class="form-control" placeholder="Ingrese la Subsección Técnica" >
              </div>
              @error('subseccion_practica')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="subseccion_campo_clinico">Subsección Campo Clínico:</label>
                <input type="text" name="subseccion_campo_clinico" id="subseccion_campo_clinico" class="form-control" required="required" placeholder="Ingrese la Subsección Técnica" >
              </div>
              @error('subseccion_campo_clinico')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="subseccion_practica">Subsección Práctica:</label>
                <select name="jornada" id="jornada" class="form-control select2" title="Seleccione la jornada">
                  <option value="D">D</option>
                  <option value="V">V</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
          <button type="submit" id="SubmitCreateAsignacion" class="btn btn-info"><i class="fa fa-save"></i> Registrar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->