@extends('layouts.app')
@section('title') Asignaturas @endsection
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="nav-icon fas fa-tag"></i> Asignaturas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Asignaturas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    @include('asignaturas.partials.create')
    @include('asignaturas.partials.edit')
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline card-tabs">
          <div class="card-header">
            <h3 class="card-title"><i class="nav-icon fas fa-tag"></i> Asignaturas registradas</h3>
            <div class="card-tools">
              @if(search_permits('Asignaturas','Imprimir PDF')=="Si" || search_permits('Asignaturas','Imprimir Excel')=="Si")
              <div class="btn-group">
                <a class="btn btn-danger dropdown-toggle btn-sm dropdown-icon text-white" data-toggle="dropdown" data-tooltip="tooltip" data-placement="top" title="Generar reportes">Imprimir </a>
                <div class="dropdown-menu dropdown-menu-right">
                  @if(search_permits('Asignaturas','Imprimir PDF')=="Si")
                  {{-- <a class="dropdown-item" href="{!!route('asignaturas.pdf')!!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en PDF"><i class="fa fa-file-pdf"></i> Exportar a PDF</a> --}}
                  @endif
                  {{-- @if(search_permits('Asignaturas','Imprimir Excel')=="Si")
                  <a class="dropdown-item" href="{!! route('asignaturas.excel') !!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en Excel"><i class="fa fa-file-excel"></i> Exportar a Excel</a>
                  @endif --}}
                </div>
              </div>
              @endif
              @if(search_permits('Asignaturas','Registrar')=="Si")
              <a class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#create_asignaturas" data-tooltip="tooltip" data-placement="top" title="Crear Asignaturas" id="createNewAsignatura">
                <i class="fa fa-save"> &nbsp;Registrar</i>
              </a>
              @endif
            </div>
          </div>
          @if(search_permits('Asignaturas','Ver mismo usuario')=="Si" || search_permits('Asignaturas','Ver todos los usuarios')=="Si" || search_permits('Asignaturas','Editar mismo usuario')=="Si" || search_permits('Asignaturas','Editar todos los usuarios')=="Si" || search_permits('Asignaturas','Eliminar mismo usuario')=="Si" || search_permits('Asignaturas','Eliminar todos los usuarios')=="Si") 
          <div class="card-body">
            <table id="asignaturas_table" class="table table-bordered table-striped table-sm" style="font-size: 12px;">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Asignatura</th>
                  <th>Programa</th>
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
<script>$(document).ready( function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#asignaturas_table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
      url:"{{ url('asignaturas') }}"
   },
    columns: [
      { data: 'codigo', name: 'codigo' },
      { data: 'asignatura', name: 'asignatura' },
      { data: 'programa', name: 'programa' },
      {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
  });
});
//--CODIGO PARA CREAR CATEGORIAS (LEVANTAR EL MODAL) ---------------------//
$('#createNewAsignatura').click(function () {
  $('#asignaturaForm').trigger("reset");
  $('#create_asignaturas').modal({backdrop: 'static', keyboard: true, show: true});
  $('.alert-danger').hide();
});
//--CODIGO PARA CREAR CATEGORIAS (GUARDAR REGISTRO) ---------------------//
$('#SubmitCreateAsignatura').click(function(e) {
  e.preventDefault();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{ route('asignaturas.store') }}",
    method: 'post',
    data: {
      asignatura: $('#asignatura').val(),
      codigo: $('#codigo').val(),
      id_programa: $('#id_programa').val()
    },
    success: function(result) {
      if(result.errors) {
        $('.alert-danger').html('');
        $.each(result.errors, function(key, value) {
          $('.alert-danger').show();
          $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
        });
      } else {
        $('.alert-danger').hide();
        var oTable = $('#asignaturas_table').dataTable();
        oTable.fnDraw(false);
        Swal.fire ( result.titulo ,  result.message ,  result.icono );
        if (result.icono=="success") {
          $("#create_asignaturas").modal('hide');
        }
      }
    }
  });
});

//--CODIGO PARA EDITAR CATEGORIA ---------------------//
$('body').on('click', '#editAsignatura', function () {
  var id = $(this).data('id');
  $.ajax({
    method:"GET",
    url: "asignaturas/"+id+"/edit",
    dataType: 'json',
    success: function(data){
      //console.log(data);
      $('#edit_asignaturas').modal({backdrop: 'static', keyboard: true, show: true});
      $('.alert-danger').hide();
      $('#id_asignatura_edit').val(data.id);
      $('#asignatura_edit').val(data.asignatura);
      $('#codigo_edit').val(data.codigo);
      $('#id_programa_edit').val(data.id_programa);
    }
  });
});
//--CODIGO PARA UPDATE CATEGORIA ---------------------//
$('#SubmitEditAsignatura').click(function(e) {
  e.preventDefault();
  var id = $('#id_asignatura_edit').val();
  $.ajax({
    method:'PUT',
    url: "asignaturas/"+id+"",
    data: {
      id_asignatura: $('#id_asignatura_edit').val(),
      asignatura: $('#asignatura_edit').val(),
      codigo: $('#codigo_edit').val(),
      id_programa: $('#id_programa_edit').val()
    },
    success: (data) => {
      if(data.errors) {
        $('.alert-danger').html('');
        $.each(data.errors, function(key, value) {
          $('.alert-danger').show();
          $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
        });
      } else {
        var oTable = $('#asignaturas_table').dataTable();
        oTable.fnDraw(false);
        Swal.fire ( data.titulo ,  data.message ,  data.icono );
        if (data.icono=="success") {
          $("#edit_asignaturas").modal('hide');
        }
      }
    },
    error: function(data){
      console.log(data);
    }
  });
});
//--CODIGO PARA ELIMINAR CATEGORIA ---------------------//
function deleteAsignatura(id){
  var id = id;
  Swal.fire({
    title: '¿Estás seguro que desea eliminar a esta asignatura?',
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
        url: "asignaturas/"+id+"",
        data: { id: id },
        dataType: 'json',
        success: function(response){
          Swal.fire ( response.titulo ,  response.message ,  response.icono );
          var oTable = $('#asignaturas_table').dataTable();
          oTable.fnDraw(false);
        },
        error: function (data) {
          Swal.fire({title: "Error del servidor", text:  "Asignatura no eliminada", icon:  "error"});
        }
      });
    }
  })
}
</script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
@endsection
