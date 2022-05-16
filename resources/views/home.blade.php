@extends('layouts.app')
@section('title') Home @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Bienvenido a SIME (Sistema Interno de Mecánica y Electromovilidad)</h1>
        
        
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Escritorio</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    
    <!-- /.row -->
    
    
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready( function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.fn.DataTable.ext.errMode='throw';

  
  var table =$('#cotizaciones_table_home').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
      url:"{{ url('cotizaciones/en_espera') }}"
   },
    columns: [
      { data: 'status', name: 'status' },
      { data: 'fecha', name: 'fecha' },
      { data: 'numero', name: 'numero' },
      { data: 'descripcion_general', name: 'descripcion_general' },
      { data: 'empresa', name: 'empresa' },
      { data: 'id_solicitante', name: 'id_solicitante' },
      { data: 'cotizador', name: 'cotizador' },
      { data: 'moneda', name: 'moneda' },
      { data: 'oc_recibida', name: 'oc_recibida' },
      { data: 'valor_total', name: 'valor_total' },
      { data: 'guia_boreal', name: 'guia_boreal' },
      { data: 'factura_boreal', name: 'factura_boreal' },
      { data: 'fecha_entrega', name: 'fecha_entrega' },
      { data: 'oc_boreal', name: 'oc_boreal' },
      {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
  });
table.ajax.reload();
$.fn.DataTable.ext.errMode='throw';
  var table2=$('#cotizaciones_d_table_home').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
      url:"{{ url('cotizaciones/en_proceso') }}"
   },
    columns: [
      { data: 'fecha', name: 'fecha' },
      { data: 'numero_oc', name: 'numero_oc' },
      { data: 'descripcion_general', name: 'descripcion_general' },
      { data: 'status', name: 'status' },
      { data: 'status2', name: 'status2' },
      { data: 'nombre', name: 'nombre' },
      { data: 'id_solicitante', name: 'id_solicitante' },
      { data: 'id_cotizador', name: 'id_cotizador' },
      { data: 'moneda', name: 'moneda' },
      { data: 'oc_recibida', name: 'oc_recibida' },
      { data: 'valor_total', name: 'valor_total' },
      { data: 'factura_boreal', name: 'factura_boreal' },
      { data: 'fecha_entrega', name: 'fecha_entrega' },
      {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
  });
table2.ajax.reload();
});
</script>
@endsection
