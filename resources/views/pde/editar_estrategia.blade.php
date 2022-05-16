@extends('layouts.app')
@section('title') Editar Estrategia de PDE @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">PDE</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('pde.index') }}">PDE</a></li>
          <li class="breadcrumb-item active">Editar PDE</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="card card-primary card-outline">
          <form action="{{ route('pde.editar_pde') }}" class="form-horizontal" method="POST" autocomplete="off" name="pdeForm" id="pdeForm" enctype="Multipart/form-data" data-parsley-validate>
            @csrf
            <div class="card-header">
              <h3 class="card-title" style="margin-top: 5px;"> Editar Estrategia de PDE: <b> {{$asignatura->codigo}} - {{$asignatura->asignatura}} - </b> Subsección Técnica: <b>{{$asignacion->subseccion_tecnica}}</b></h3>
              <div class="float-right">
                <a href="{{ route('pde.index') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Regresar</a>                
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar registro</button>
              </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" id="card-body">
              <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
              
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;" id="message_error">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="false">&times;</span>
                  </button>
              </div>
              <input type="hidden" name="id_pde" id="id_pde" value="{{$pde->id}}">

              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="fecha">Fecha <b style="color: red;">*</b></label>
                    <input type="date" value="{{$pde->fecha}}" name="fecha" id="fecha" class="form-control" min="{{date('Y-m-d')}}">
                  </div>
                  @error('fecha')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="ponderacion_eval">Ponderación de Evaluación <b style="color: red;">*</b></label>
                    <input type="number" step="0.2" min="0" name="ponderacion_eval" value="{{$pde->ponderacion_eval}}" id="ponderacion_eval" class="form-control" readonly="readonly" placeholder="Ingrese la Ponderación de la Evaluación">
                  </div>
                  @error('ponderacion_eval')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="nota_eval">Nota de la Evaluación <b style="color: red;">*</b></label>
                    <input type="number" step="0.2" min="0" value="0" name="nota_eval" value="{{$pde->nota_eval}}" id="nota_eval" class="form-control" placeholder="Ingrese la Nota de la Evaluación de la Evaluación">
                  </div>
                  @error('nota_eval')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div> 
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="instrumento_eval">Instrumento de Evaluación <b style="color: red;">*</b></label>
                        <input type="text" name="instrumento_eval" id="instrumento_eval" class="form-control" required="required" value="{{$pde->instrumento_eval}}" placeholder="Ingrese el Instrumento de Evaluación" onkeyup="this.value = this.value.toUpperCase();">
                      </div>
                      @error('instrumento_eval')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div> 
              </div>
            </div>
            <!-- /.card-body -->
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});

</script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
@endsection
