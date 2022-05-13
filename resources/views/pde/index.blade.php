@extends('layouts.app')
@section('title') PDE @endsection
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="nav-icon fa fa-shopping-basket"></i> PDE</h1>
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
            <h3 class="card-title"><i class="nav-icon fa fa-shopping-basket"></i> PDE registrados</h3>
            <div class="card-tools">
              @if(search_permits('PDE','Imprimir PDF')=="Si" || search_permits('PDE','Imprimir Excel')=="Si")
              <div class="btn-group">
                <a class="btn btn-danger dropdown-toggle btn-sm dropdown-icon text-white" data-toggle="dropdown" data-tooltip="tooltip" data-placement="top" title="Generar reportes">Imprimir </a>
                <div class="dropdown-menu dropdown-menu-right">
                  @if(search_permits('PDE','Imprimir PDF')=="Si")
                  {{-- <a class="dropdown-item" href="{!!route('PDE.pdf')!!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en PDF"><i class="fa fa-file-pdf"></i> Exportar a PDF</a> --}}
                  @endif
                  {{-- @if(search_permits('PDE','Imprimir Excel')=="Si")
                  <a class="dropdown-item" href="{!! route('PDE.excel') !!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en Excel"><i class="fa fa-file-excel"></i> Exportar a Excel</a>
                  @endif --}}
                </div>
              </div>
              @endif
              @if(search_permits('PDE','Registrar')=="Si")
              {{-- <a href="{!! route('PDE.create') !!}" class="btn bg-gradient-primary btn-sm pull-right" data-tooltip="tooltip" data-placement="top" title="Registrar producto"><i class="fas fa-edit"></i> Registrar PDE</a> --}}

              <a href="{!! route('PDE.create') !!}" class="btn btn-info btn-sm text-white" data-tooltip="tooltip" data-placement="top" title="Crear PDE">
                <i class="fa fa-save"> &nbsp;Registrar</i>
              </a>
              @endif
            </div>
          </div>
          @if(search_permits('PDE','Ver mismo usuario')=="Si" || search_permits('PDE','Ver todos los usuarios')=="Si" || search_permits('PDE','Editar mismo usuario')=="Si" || search_permits('PDE','Editar todos los usuarios')=="Si" || search_permits('PDE','Eliminar mismo usuario')=="Si" || search_permits('PDE','Eliminar todos los usuarios')=="Si")

          <div class="card-body">
            <table id="PDE_table" class="table table-bordered table-striped table-sm" style="font-size: 12px;">
              <thead>
                <tr>
                  <th>Periodo</th>
                  <th>DV</th>
                  <th>Profesor</th>
                  <th>COD</th>
                  <th>Asignatura</th>
                  <th>Subsección Técnica</th>
                  <th>Subsección Prática</th>
                  <!-- <th>Subsección Campo Clínico</th>
                  <th>Jornada</th>
                  <th>Evaluaciones Ingresadas</th>
                  <th>Evaluaciones Mínimas</th>
                  <th>Notas Ingresadas</th>
                  <th>Ingreso Promedio Presentación</th>
                  <th>Status Asig.</th> -->
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
    @include('PDE.partials.create')
    @include('PDE.partials.edit')
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
  $('#PDE_table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
      url:"{{ url('PDE') }}"
   },
    columns: [
      { data: 'periodo', name: 'periodo' },
      { data: 'codigo', name: 'codigo' },
      { data: 'programa_estudio', name: 'programa_estudio' },
      { data: 'profesor', name: 'profesor' },
      { data: 'rut', name: 'rut' },
      { data: 'dv', name: 'dv' },
      {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
  });
});

//--CODIGO PARA EDITAR ESTADO ---------------------//
$('body').on('click', '#editProducto', function () {
  var id = $(this).data('id');

  $.ajax({
    method:"GET",
    url: "PDE/"+id+"/edit",
    dataType: 'json',
    success: function(data){
      $('#edit_producto').modal({backdrop: 'static', keyboard: true, show: true});
      $('.alert-danger').hide();
      $('#id_producto_edit').val(data.id);
      $('#codigo_edit').text(data.codigo);
      $('#detalles_edit').val(data.detalles);
      $('#id_categoria_edit').val(data.id_categoria);
      $('#status_edit').val(data.status);
    }
  });
});
//--CODIGO PARA UPDATE ESTADO ---------------------//

//--CODIGO PARA ELIMINAR ESTADO ---------------------//
function deleteProducto(id){
  var id = id;
  Swal.fire({
    title: '¿Estás seguro que desea eliminar a esta producto?',
    text: "¡Esta opción no podrá deshacerse en el futuro!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Si, Eliminar!',
    cancelButtonText: 'No, Cancelar!'
  }).then((result) => {
    if (result.isConfirmed) {
      // ajax
      $.ajax({
        type:"DELETE",
        url: "PDE/"+id+"",
        data: { id: id },
        dataType: 'json',
        success: function(response){
          Swal.fire ( response.titulo ,  response.message ,  response.icono );
          var oTable = $('#PDE_table').dataTable();
          oTable.fnDraw(false);
        },
        error: function (data) {
          Swal.fire({title: "Error del servidor", text:  "Producto no eliminada", icon:  "error"});
        }
      });
    }
  })
}
</script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
@endsection
