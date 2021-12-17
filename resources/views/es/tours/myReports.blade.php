@extends('template')

@section('titulo')
<title>Mis Reportes :: IVAO Argentina</title>
@endsection

@section('contenido')
@php include('/var/www/vhosts/ar.ivao.aero/httpdocs/public/funciones.php'); @endphp

<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

<div class="container marketing">
                                    
<table class="table table-striped">
      <thead class="thead-dark">
            <tr class="thead-dark">
              <th>#</th>
              <th>Tour</th>
              <th>Pierna</th>
              <th>Validador</th>
              <th>Estado</th>
            </tr>
      </thead>
   <tbody>
@foreach($reports as $report)
        @php if(obtenerNombreUsuario($report->validator) == '-') $report->validator = 0; @endphp
          <tr>
            <td>R{{$report->id}}</td>
            <td>{{$report->tour_code}}</td>
            <td>{{$report->leg}}</td>
            <td><a href="https://www.ivao.aero/Member.aspx?Id={{$report->validator}}">{!! obtenerNombreUsuario($report->validator) !!}</a></td>
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

  <!-- INICIO TABLA -->
   </div><!-- /.container -->
</section>
@endsection