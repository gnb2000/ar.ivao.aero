@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGINA -->
<section>

    <div class="container marketing">

   <div class="tabla-novedades">
   
    <div class="row">
      <div class="col-md-3">
        
            <!-- /. MENU INTRAWEB ./ -->
        
            @php include($_SERVER['DOCUMENT_ROOT'].'/intranet/menu_intraweb.php'); @endphp
        
        </div><!-- /.col-md-3 -->
        
      <div class="col-md-9">

        <div class="tooltip-demo">
        

                      <!-- INICIO CONTENIDO -->
                        
                        <h2>Tours <small> Reportes</small></h2><br />
                                    
<table class="table table-striped">
      <thead class="thead-dark">
            <tr class="thead-dark">
              <th>#</th>
              <th>Tour</th>
              <th>Pierna</th>
              <th>Estado</th>
            </tr>
      </thead>
   <tbody>
@foreach($reports as $report)
          <tr>
            <td>R{{$report->id}}</td>
            <td>{{$report->tour_code}}</td>
            <td>{{$report->leg}}</td>
			  @if($report->status == 0)
			<td><span class="p-2 badge badge-warning">Pendiente</span></td>
			  @elseif($report->status == 1)
			<td><span class="p-2 badge badge-success" data-toggle="tooltip" data-placement="bottom" title="{!! $report->validator_remarks !!}">Aceptado</span></td>
			  @else
			<td><span class="p-2 badge badge-danger" data-toggle="tooltip" data-placement="bottom" title="{!! $report->validator_remarks !!}">Rechazado</span></td>
			  @endif
          </tr>
@endforeach
     </tbody>
 </table>
{{$reports->links()}}

    <!-- FINAL CONTENIDO -->
  </section>
@endsection