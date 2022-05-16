@extends('layouts.app')
@section('title') Plan de Evaluación @endsection
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><!-- <i class="nav-icon fa fa-shopping-basket"></i> --> Plan de Evaluación</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">PDE</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline card-tabs">
          <p></p>
          <div class="card-header">
            <h3 class="card-title"><!-- <i class="nav-icon fa fa-shopping-basket"></i> --> Plan de Evaluación registrados</h3>
            <div class="card-tools">
              @if(search_permits('PDE','Imprimir PDF')=="Si" || search_permits('PDE','Imprimir Excel')=="Si")
              <div class="btn-group">
                <!-- <a class="btn btn-danger dropdown-toggle btn-sm dropdown-icon text-white" data-toggle="dropdown" data-tooltip="tooltip" data-placement="top" title="Generar reportes">Imprimir </a> -->
                <div class="dropdown-menu dropdown-menu-right">
                  @if(search_permits('PDE','Imprimir PDF')=="Si")
                  {{-- <a class="dropdown-item" href="{!!route('pde.pdf')!!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en PDF"><i class="fa fa-file-pdf"></i> Exportar a PDF</a> --}}
                  @endif
                  {{-- @if(search_permits('PDE','Imprimir Excel')=="Si")
                  <a class="dropdown-item" href="{!! route('pde.excel') !!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en Excel"><i class="fa fa-file-excel"></i> Exportar a Excel</a>
                  @endif --}}
                </div>
              </div>
              @endif
              @if(search_permits('PDE','Registrar')=="Si")
              {{-- <a href="{!! route('pde.create') !!}" class="btn bg-gradient-primary btn-sm pull-right" data-tooltip="tooltip" data-placement="top" title="Registrar producto"><i class="fas fa-edit"></i> Registrar PDE</a> --}}

              <!-- <a href="{!! route('pde.create') !!}" class="btn btn-info btn-sm text-white" data-tooltip="tooltip" data-placement="top" title="Crear PDE">
                <i class="fa fa-save"> &nbsp;Registrar</i>
              </a> -->
              @endif
            </div>
          </div>
          @if(search_permits('PDE','Ver mismo usuario')=="Si" || search_permits('PDE','Ver todos los usuarios')=="Si" || search_permits('PDE','Editar mismo usuario')=="Si" || search_permits('PDE','Editar todos los usuarios')=="Si" || search_permits('PDE','Eliminar mismo usuario')=="Si" || search_permits('PDE','Eliminar todos los usuarios')=="Si")
          <input type="hidden" name="id_asignacion" id="id_asignacion" value="{{$id_asignacion}}">
          <div class="card-body">
            <table id="PDE_listar_table" class="table table-bordered table-striped table-sm" style="font-size: 12px;">
              <thead>
                <tr>
                  <th>Periodo</th>
                  <th>Código</th>
                  <th>Asignatura</th>
                  <th>Subsección Técnica</th>
                  <th>Fecha</th>
                  <th>Ponderación de Eval.</th>
                  <th>Nota de Eval.</th>
                  <th>Instrumento Eval.</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
          @else
          <div class="row">
            <div class="col-12">                          
              <div class="alert alert-danger alert-dismissible text-center">
                <h5><i class="icon fas fa-ban"></i> ¡Alerta!</h5>
                ACCESO RESTRINGIDO, NO POSEE PERMISO.
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
    
  </div><!-- /.container-fluid -->
</section>
@endsection
@section('scripts')
<script>
$(document).ready( function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var id_asignacion=$("#id_asignacion").val();
  $('#PDE_listar_table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
      url: "../../pde/"+id_asignacion+"/ver_pde",
   },
    columns: [
      { data: 'periodo', name: 'periodo' },
      { data: 'codigo', name: 'codigo' },
      { data: 'asignatura', name: 'asignatura' },
      { data: 'subseccion_tecnica', name: 'subseccion_tecnica' },
      { data: 'fecha', name: 'fecha' },
      { data: 'ponderacion_eval', name: 'ponderacion_eval' },
      { data: 'nota_eval', name: 'nota_eval' },
      { data: 'instrumento_eval', name: 'instrumento_eval' },
      {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
  });
});


</script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
@endsection
