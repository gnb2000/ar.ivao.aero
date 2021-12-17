@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" type="text/javascript"></script>
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
          
<h2>Miembros Registrados en IVAO Argentina</h2>
  <div id="totalmembers" style="height: 400px; width: 100%;"></div><br>
<br>

<h2>Miembros Activos en IVAO Argentina</h2>
  <div id="activemembers" style="height: 400px; width: 100%;"></div><br>
<br>

<h2>Horas Online de IVAO Argentina</h2>
  <div id="totaltime" style="height: 400px; width: 100%;"></div><br>
<br>

<h2>Horas Online Semanales de IVAO Argentina</h2>
  <div id="timeweek" style="height: 400px; width: 100%;"></div><br>
<br>
  
<h2>Registros Semanales en IVAO Argentina</h2>
  <div id="regweek" style="height: 400px; width: 100%;"></div><br>
<br>

<script>
Morris.Line({
  // ID of the element in which to draw the chart.
  element: "totalmembers",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
    @php $i = 0; @endphp
    @foreach($estadisticas as $row)
        @if(++$i < (count($estadisticas) ))
        { date: "{{$row->Date}}", value: {{$row->TotalMembers}} }, 
        @else
        { date: "{{$row->Date}}", value: {{$row->TotalMembers}} }
        @endif
    @endforeach
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Total Members"]
});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: "activemembers",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
    @php $i = 0; @endphp
    @foreach($estadisticas as $row)
        @if(++$i < (count($estadisticas) ))
        { date: "{{$row->Date}}", value: {{$row->ActiveMembers}} }, 
        @else
        { date: "{{$row->Date}}", value: {{$row->ActiveMembers}} }
        @endif
    @endforeach
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Active Members"]
});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: "totaltime",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
    @php $i = 0; @endphp
    @foreach($estadisticas as $row)
        @if(++$i < (count($estadisticas) ))
        { date: "{{$row->Date}}", value: {{$row->TotalTime}} }, 
        @else
        { date: "{{$row->Date}}", value: {{$row->TotalTime}} }
        @endif
    @endforeach
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Total Time"]
});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: "timeweek",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
    @php $i = 0; @endphp
    @foreach($estadisticas as $row)
        @if(++$i < (count($estadisticas) ))
        { date: "{{$row->Date}}", value: {{$row->TimeWeek}} }, 
        @else
        { date: "{{$row->Date}}", value: {{$row->TimeWeek}} }
        @endif
    @endforeach
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Time per Week"]
});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: "regweek",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
    @php $i = 0; @endphp
    @foreach($estadisticas as $row)
        @if(++$i < (count($estadisticas) ))
        { date: "{{$row->Date}}", value: {{$row->RegWeek}} }, 
        @else
        { date: "{{$row->Date}}", value: {{$row->RegWeek}} }
        @endif
    @endforeach
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Registers per Week"]
});
</script>

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