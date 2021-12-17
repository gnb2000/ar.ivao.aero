@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('contenido')

@php include($_SERVER['DOCUMENT_ROOT'].'/funciones.php'); @endphp

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

<h2>Tours <small> Reportes</small><br />
                        <!-- <a style="float:right;" onClick="mostrarAJAX('Entrenamiento/CompletedTrainingsFilter.php', tooltip-demo')" data-original-title="Filtrar" role="button" class="btn btn-success btn-xs">Filtrar</a> -->
                        </h2>
                        
                        <div class="separacion-tablas"></div>

                        @include('flash::message')
                         <table class="table table-striped">

                          <thead class="thead-dark">
                                <tr>
                                  <th>C&oacute;digo</th>
                                  <th>Miembro</th>
                                  <th>Tour</th>
                                  <th>Leg</th>
                                  <th>Motivo</th>
                                  <th>Remarks</th>
                                  <th></th>
                                </tr>
                             </thead>
                                
                             <tbody>
                  
                    @foreach($reports as $report)
                    @php
                    $date = date('Y-m-d', strtotime($report->takeoff_time));
                    @endphp
                    <tr>
                       <td>R{{$report->id}}</td>
                       <td><a href="/intraweb/{{$report->vid}}/{{$report->tour_code}}/reports">{{obtenerNombreUsuario($report->vid)}}</a></td>
                       <td>{{$report->tour_code}}</td>
                       <td>{{$report->leg_number}} ({{$report->leg}})</td>
                       <td><span class="p-2 badge badge-warning">{{$report->reason}}</span></td>
                       <td>{!! $report->user_remarks !!}</td>
                       <td><a onClick="if(!confirm('&iquest;Est&aacute; seguro de que quiere validar esta pierna?')) return false;" href="/intraweb/tour/{{$report->id}}/validate" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Validar"><img alt="validar" src="http://www.ar.ivao.aero/img/ico/tick.png"></a> <a onClick="if(!confirm('&iquest;Est&aacute; seguro de que quiere rechazar esta pierna?')) return false;" href="/intraweb/tour/{{$report->id}}/reject" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Rechazar"><img alt="rechazar" src="http://www.ar.ivao.aero/img/ico/cross-circle.png"></a> <a target="_blank" href="https://tracker.ivao.aero/search.php?vid={{$report->vid}}&callsign={{$report->callsign}}&conntype=PILOT&date={{$date}}&search=Search" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Tracker"><img alt="tracker" src="https://ar.ivao.aero/img/ico/clipboard-task.png"></a></td>
                    </tr>           
                    @endforeach                
           </tbody>
       </table>
       {{$reports->links()}}
<!-- FINAL CONTENIDO -->

         </div><!-- /.tooltip-demo -->
        
        </div><!-- /.col-md-9 -->
	</div><!-- /.row -->
    
    </div><!-- /.tabla-novedades-->
    
    </div><!-- /.container -->
</div> <!-- /.contenidocentral -->
  
   <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">
  
  <!-- /END THE FEATURETTES -->

  </section>
@endsection