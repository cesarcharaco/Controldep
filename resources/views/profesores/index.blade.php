@extends('layouts.app')
@section('title') Profesores @endsection
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="nav-icon fa fa-user"></i> Profesores</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Profesores</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    @include('profesores.partials.create')
    @include('profesores.partials.edit')
    @include('profesores.partials.asignar')
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline card-tabs">
          <div class="card-header">
            <h3 class="card-title"><i class="nav-icon fa fa-user"></i> Profesores registrados</h3>
            <div class="card-tools">
              @if(search_permits('Profesores','Imprimir PDF')=="Si" || search_permits('Profesores','Imprimir Excel')=="Si")
              <div class="btn-group">
                <a class="btn btn-danger dropdown-toggle btn-sm dropdown-icon text-white" data-toggle="dropdown" data-tooltip="tooltip" data-placement="top" title="Generar reportes">Imprimir </a>
                <div class="dropdown-menu dropdown-menu-right">
                  @if(search_permits('Profesores','Imprimir PDF')=="Si")
                  {{-- <a class="dropdown-item" href="{!!route('profesores.pdf')!!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en PDF"><i class="fa fa-file-pdf"></i> Exportar a PDF</a> --}}
                  @endif
                  {{-- @if(search_permits('Profesores','Imprimir Excel')=="Si")
                  <a class="dropdown-item" href="{!! route('profesores.excel') !!}" target="_blank" data-tooltip="tooltip" data-placement="top" title="Reportes en Excel"><i class="fa fa-file-excel"></i> Exportar a Excel</a>
                  @endif --}}
                </div>
              </div>
              @endif
              @if(search_permits('Profesores','Registrar')=="Si")
              {{-- <a href="{!! route('profesores.create') !!}" class="btn bg-gradient-primary btn-sm pull-right" data-tooltip="tooltip" data-placement="top" title="Registrar profesor"><i class="fas fa-edit"></i> Registrar profesores</a> --}}

              <a class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#create_profesores" data-tooltip="tooltip" data-placement="top" title="Crear Profesores">
                <i class="fa fa-save"> &nbsp;Registrar</i>
              </a>
              @endif
            </div>
          </div>
          @if(search_permits('Profesores','Ver mismo usuario')=="Si" || search_permits('Profesores','Ver todos los usuarios')=="Si" || search_permits('Profesores','Editar mismo usuario')=="Si" || search_permits('Profesores','Editar todos los usuarios')=="Si" || search_permits('Profesores','Eliminar mismo usuario')=="Si" || search_permits('Profesores','Eliminar todos los usuarios')=="Si")
          <div class="card-body">
            <table id="profesores_table" class="table table-bordered table-striped table-sm" style="font-size: 12px;">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Nombres y Apellidos</th>
                  <th>RUT</th>
                  <th>DV</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Nombre de Usuario</th>
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
  /*$.fn.DataTable.ext.errMode='throw';
  var table=*/
  $('#profesores_table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
      url:"{{ url('profesores') }}"
   },
    columns: [
      { data: 'status', name: 'status' },
      { data: 'profesor', name: 'profesor' },
      { data: 'rut', name: 'rut' },
      { data: 'dv', name: 'dv' },
      { data: 'telefono', name: 'telefono' },
      { data: 'correo', name: 'correo' },
      { data: 'username', name: 'username' },
      {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
  });
//table.ajax.reload();
});

//--CODIGO PARA CREAR PBX (LEVANTAR EL MODAL) ---------------------//
$('#createNewProfesor').click(function () {
  $('#profesorForm').trigger("reset");
  $('#create_profesores').modal({backdrop: 'static', keyboard: true, show: true});
  $('.alert-danger').hide();
});
//--CODIGO PARA CREAR PORFESORES (GUARDAR REGISTRO) ---------------------//
$('#SubmitCreateProfesor').click(function(e) {
  e.preventDefault();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

  });

  $.ajax({
    url: "{{ route('profesores.store') }}",
    method: 'post',
    data: {
      profesor: $('#profesor').val(),
      rut: $('#rut').val(),
      dv: $('#dv').val(),
      telefono: $('#telefono').val(),
      correo: $('#correo').val(),
      username: $('#username').val(),
    },
    success: function(result) {
      //console.log(result);
      if(result.errors) {
        $('.alert-danger').html('');
        $.each(result.errors, function(key, value) {
          $('.alert-danger').show();
          $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
        });
      } else {
        $('.alert-danger').hide();
        var oTable = $('#profesores_table').dataTable();
        oTable.fnDraw(false);
        Swal.fire ( result.titulo ,  result.message ,  result.icono );
        if (result.icono=="success") {
          $("#create_profesores").modal('hide');
        }
      }
    }
  });
});

//--CODIGO PARA EDITAR PROFESOR ---------------------//
$('body').on('click', '#editProfesor', function () {
  var id = $(this).data('id');
  $('#edit_profesores').trigger("reset");
  $.ajax({
    method:"GET",
    url: "profesores/"+id+"/edit",
    dataType: 'json',
    success: function(data){
      $('#edit_profesores').modal({backdrop: 'static', keyboard: true, show: true});
      $('.alert-danger').hide();
      $('#id_profesor_edit').val(data.id);
      $('#profesor_edit').val(data.profesor);
      $('#rut_edit').val(data.rut);
      $('#dv_edit').val(data.dv);
      $('#telefono_edit').val(data.telefono);
      $('#correo_edit').val(data.correo);
      $('#username_edit').val(data.name);
    }
  });
});

//--CODIGO PARA ASIGNAR ASIGNATURAS A PROFESOR ---------------------//
$('body').on('click', '#asignarProfesor', function () {
  var id = $(this).data('id');
  $("#id_profesor").val(id);
  $('#asignarAsignaturaForm').trigger("reset");
  $('#asignar_asignatura').modal({backdrop: 'static', keyboard: true, show: true});
      $('.alert-danger').hide();
  
});
//--CODIGO PARA UPDATE ESTADO ---------------------//
$('#SubmitEditProfesor').click(function(e) {
  e.preventDefault();
  var id = $('#id_profesor_edit').val();
  var reset;

  if ($("#reset_clave").is(':checked')) {
    reset=1;
  }else{
    reset=null;
  }
  $.ajax({
    method:'PUT',
    url: "profesores/"+id+"",
    data: {
      id_profesor: $('#id_profesor_edit').val(),
      profesor: $('#profesor_edit').val(),
      rut: $('#rut_edit').val(),
      dv: $('#dv_edit').val(),
      telefono: $('#telefono_edit').val(),
      correo: $('#correo_edit').val(),
      username: $('#username_edit').val(),
      status: $('#status_edit').val(),
      clave_nueva: $('#clave').val(),
      clave_nueva2: $('#clave2').val(),
      reset_clave: reset
    },
    success: (data) => {
      if(data.errors) {
        $('.alert-danger').html('');
        $.each(data.errors, function(key, value) {
          $('.alert-danger').show();
          $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
        });
      } else {
        var oTable = $('#profesores_table').dataTable();
        oTable.fnDraw(false);
        Swal.fire ( data.titulo ,  data.message ,  data.icono );
        if (data.icono=="success") {
          $("#edit_profesores").modal('hide');
        }
      }
    },
    error: function(data){
      console.log(data);
    }
  });
});
//--CODIGO PARA ELIMINAR ESTADO ---------------------//
function deleteProfesor(id){
  var id = id;
  Swal.fire({
    title: '¿Estás seguro que desea eliminar a este profesor?',
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
        url: "profesores/"+id+"",
        data: { id: id },
        dataType: 'json',
        success: function(response){
          Swal.fire ( response.titulo ,  response.message ,  response.icono );
          var oTable = $('#profesores_table').dataTable();
          oTable.fnDraw(false);
        },
        error: function (data) {
          Swal.fire({title: "Error del servidor", text:  "Profesor no eliminado", icon:  "error"});
        }
      });
    }
  });
}

  $("#reset_clave").on('change', function (event) {
    if ($("#reset_clave").is(':checked')) {
      $("#clave_nueva").css('display','block');
      $("#clave_nueva2").css('display','block');
      $("#clave_nueva").attr('required',true);
      $("#clave_nueva2").attr('required',true);
    }else{
      $("#clave_nueva").css('display','none');
      $("#clave_nueva2").css('display','none');
      $("#clave_nueva").removeAttr('required');
      $("#clave_nueva2").removeAttr('required');
    }
  });
  $("#id_programa").on('change', function(){
    var id_programa=$("#id_programa").val();
    $.get("/programas/"+id_programa+'/buscar_asignaturas', function (data) {
      //console.log(data);
      if (data.length > 0) {
        $("#id_asignatura").empty();
        for (var i = 0; i < data.length; i++) {
          $("#id_asignatura").append('<option value="'+data[i].id+'">'+data[i].codigo+' - '+data[i].asignatura+'</option>');
        }
      }
    })
  });
  //--CODIGO PARA ASIGNAR ASIGNATURAS A PORFESORES (GUARDAR REGISTRO) ---------------------//
$('#SubmitCreateAsignacion').click(function(e) {
  e.preventDefault();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

  });

  $.ajax({
    url: "{{ route('profesores.asignar') }}",
    method: 'post',
    data: {
      id_profesor: $('#id_profesor').val(),
      id_programa: $('#id_programa').val(),
      id_asignatura: $('#id_asignatura').val(),
      id_periodo: $('#id_periodo').val(),
      horas: $('#horas').val(),
      semestre: $('#semestre').val(),
      pensum: $('#pensum').val(),
      seccion: $('#seccion').val(),
      subseccion_practica: $('#subseccion_practica').val(),
      subseccion_campo_clinico: $('#subseccion_campo_clinico').val(),
      jornada: $('#jornada').val(),
    },
    success: function(result) {
      //console.log(result);
      if(result.errors) {
        $('.alert-danger').html('');
        $.each(result.errors, function(key, value) {
          $('.alert-danger').show();
          $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
        });
      } else {
        $('.alert-danger').hide();
        var oTable = $('#profesores_table').dataTable();
        oTable.fnDraw(false);
        Swal.fire ( result.titulo ,  result.message ,  result.icono );
        if (result.icono=="success") {
          $("#asignar_asignatura").modal('hide');
        }
      }
    }
  });
});

</script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
@endsection
