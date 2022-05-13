@extends('layouts.app')
@section('title') Programas de Estudio @endsection
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="nav-icon fas fa-tag"></i> Programas de Estudio</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Programas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    @include('programas.partials.create')
    @include('programas.partials.edit')
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline card-tabs">
          <div class="card-header">
            <h3 class="card-title"><i class="nav-icon fas fa-tag"></i> Programas registrados</h3>
            <div class="card-tools">
              @if(search_permits('Programas','Imprimir PDF')=="Si" || search_permits('Programas','Imprimir Excel')=="Si")
              <div class="btn-group">
                <a class="btn btn-danger dropdown-toggle btn-sm dropdown-icon text-white" data-toggle="dropdown" data-tooltip="tooltip" data-placement="top" title="Generar reportes">Imprimir </a>
                <div class="dropdown-menu dropdown-menu-right">
                  @if(search_permits('Programas','Imprimir PDF')=="Si")
                  {{-- <a class="dropdown-item" href="{!!route('programas.pdf')!!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en PDF"><i class="fa fa-file-pdf"></i> Exportar a PDF</a> --}}
                  @endif
                  {{-- @if(search_permits('Programas','Imprimir Excel')=="Si")
                  <a class="dropdown-item" href="{!! route('programas.excel') !!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en Excel"><i class="fa fa-file-excel"></i> Exportar a Excel</a>
                  @endif --}}
                </div>
              </div>
              @endif
              @if(search_permits('Programas','Registrar')=="Si")
              <a class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#create_programas" data-tooltip="tooltip" data-placement="top" title="Crear Programas" id="createNewPrograma">
                <i class="fa fa-save"> &nbsp;Registrar</i>
              </a>
              @endif
            </div>
          </div>
          @if(search_permits('Programas','Ver mismo usuario')=="Si" || search_permits('Programas','Ver todos los usuarios')=="Si" || search_permits('Programas','Editar mismo usuario')=="Si" || search_permits('Programas','Editar todos los usuarios')=="Si" || search_permits('Programas','Eliminar mismo usuario')=="Si" || search_permits('Programas','Eliminar todos los usuarios')=="Si") 
          <div class="card-body">
            <table id="programas_table" class="table table-bordered table-striped table-sm" style="font-size: 12px;">
              <thead>
                <tr>
                  <th>COD</th>
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
  $('#programas_table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
      url:"{{ url('programas') }}"
   },
    columns: [
      { data: 'cod', name: 'cod' },
      { data: 'programa', name: 'programa' },
      {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
  });
});
//--CODIGO PARA CREAR CATEGORIAS (LEVANTAR EL MODAL) ---------------------//
$('#createNewPrograma').click(function () {
  $('#programaForm').trigger("reset");
  $('#create_programas').modal({backdrop: 'static', keyboard: true, show: true});
  $('.alert-danger').hide();
});
//--CODIGO PARA CREAR CATEGORIAS (GUARDAR REGISTRO) ---------------------//
$('#SubmitCreatePrograma').click(function(e) {
  e.preventDefault();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{ route('programas.store') }}",
    method: 'post',
    data: {
      programa: $('#programa').val(),
      cod: $('#cod').val()
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
        var oTable = $('#programas_table').dataTable();
        oTable.fnDraw(false);
        Swal.fire ( result.titulo ,  result.message ,  result.icono );
        if (result.icono=="success") {
          $("#create_programas").modal('hide');
        }
      }
    }
  });
});

//--CODIGO PARA EDITAR CATEGORIA ---------------------//
$('body').on('click', '#editPrograma', function () {
  var id = $(this).data('id');
  $.ajax({
    method:"GET",
    url: "programas/"+id+"/edit",
    dataType: 'json',
    success: function(data){
      //console.log(data);
      $('#edit_programas').modal({backdrop: 'static', keyboard: true, show: true});
      $('.alert-danger').hide();
      $('#id_programa_edit').val(data.id);
      $('#programa_edit').val(data.programa);
      $('#cod_edit').val(data.cod);
    }
  });
});
//--CODIGO PARA UPDATE CATEGORIA ---------------------//
$('#SubmitEditPrograma').click(function(e) {
  e.preventDefault();
  var id = $('#id_programa_edit').val();
  $.ajax({
    method:'PUT',
    url: "programas/"+id+"",
    data: {
      id_programa: $('#id_programa_edit').val(),
      programa: $('#programa_edit').val(),
      cod: $('#cod_edit').val()
    },
    success: (data) => {
      if(data.errors) {
        $('.alert-danger').html('');
        $.each(data.errors, function(key, value) {
          $('.alert-danger').show();
          $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
        });
      } else {
        var oTable = $('#programas_table').dataTable();
        oTable.fnDraw(false);
        Swal.fire ( data.titulo ,  data.message ,  data.icono );
        if (data.icono=="success") {
          $("#edit_programas").modal('hide');
        }
      }
    },
    error: function(data){
      console.log(data);
    }
  });
});
//--CODIGO PARA ELIMINAR CATEGORIA ---------------------//
function deletePrograma(id){
  var id = id;
  Swal.fire({
    title: '¿Estás seguro que desea eliminar a este programa?',
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
        url: "programas/"+id+"",
        data: { id: id },
        dataType: 'json',
        success: function(response){
          Swal.fire ( response.titulo ,  response.message ,  response.icono );
          var oTable = $('#programas_table').dataTable();
          oTable.fnDraw(false);
        },
        error: function (data) {
          Swal.fire({title: "Error del servidor", text:  "Programa no eliminado", icon:  "error"});
        }
      });
    }
  })
}
</script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
@endsection
