@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('contenido')

@php include('/var/www/vhosts/ar.ivao.aero/httpdocs/public/funciones.php'); @endphp

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

<h2 id="cacaculopis">Entrenamiento <small> GCA</small></h2>

<div class="separacion-tablas"></div>           

<a style="float:right; color: white;" data-original-title="Agregar Nuevo" href="/intraweb/gca/add" role="button" class="btn btn-success btn-lg">Agregar</a></h2>
               
@include('flash::message')

<div style="margin-top: 15px;"></div>

 <!-- ==================================================================== -->
 <table class="table table-hover">

  <thead class="thead-dark">
    <tr style="text-align: center">
      <th>Miembro</th>
      <th>Rango</th>
      <th>Posiciones Adicionales</th>
      <th>Fecha</th>
      <th></th>
    </tr>
  </thead>

  <tbody>
    
    @foreach($gcas as $gca)
    @php
    if($gca->rating == 'ADC') $rango = 5;
    else if($gca->rating == 'APC') $rango = 6;
    else $rango = 7;
    @endphp
    <tr style="text-align: center;">
     <td><a href="https://www.ivao.aero/Member.aspx?Id={{$gca->vid}}">{{$gca->name}}</a></td>
     <td><img src="https://www.ivao.aero/data/images/ratings/atc/{{$rango}}.gif" alt="rango" title="{{$gca->rating}}"></td>
     <td>{!! $gca->comments !!}</td>
     <td>{{$gca->accept_date}}</td>
      <td style="text-align:center">
      <a onClick="if(! confirm('&iquest;Est&aacute; seguro que desea eliminar este GCA?')) return false;" href="/intraweb/gca/{{$gca->vid}}/delete" data-original-title="Eliminar" role="button" class="btn btn-danger">
      Eliminar
      </a>
      </td>
    </tr>
    @endforeach

  </tbody>
 </table>

<!-- ............................................................................................... -->

 <hr style="margin-bottom: 50px;" />

<h2 id="cacaculopis2">Entrenamiento <small> Horas Mensuales (&Uacute;ltimos 3 meses)</small></h2>

<div class="separacion-tablas"></div>           

<div style="margin-top: 15px;"></div>

  <table class="table table-hover">

    <thead class="thead-dark">
      <tr style="text-align: center;">
        <th>Miembro</th>
        <th>Mes</th>
        <th>Horas</th>
        <th>Horas Cumplidas</th>
      </tr>
    </thead>

    <tbody>

    @foreach($tresMeses as $fila)
    @php
    $fechaArray = explode('-', $fila->fecha);
    $fecha = obtenerNombreMes($fechaArray[1]).' '.$fechaArray[0];
    $horasCumplidas = $fila->suma > 20000 ? '<i class="fas fa-check-square alert-success"></i>' : '<i class="fas fa-times-circle alert-danger"></i>';
    $suma = obtenerHorasMinutos($fila->suma);
    @endphp
    <tr style="text-align: center;">
       <td><a href="https://www.ivao.aero/Member.aspx?Id={{$fila->vid}}">{{$fila->name}}</a></td>
       <td>{{$fecha}}</td>
       <td>{{$suma}}</td>
       <td>{!! $horasCumplidas !!}</td>
    </tr>
    @endforeach

    </tbody>

 </table>

<!-- ............................................................................................... -->

 <hr style="margin-bottom: 50px;" />

<h2 id="cacaculopis2">Entrenamiento <small> Conexiones no autorizadas (&Uacute;ltimos 6 meses)</small></h2>

<div class="separacion-tablas"></div>           

<div style="margin-top: 15px;"></div>

  <table class="table table-hover">

    <thead class="thead-dark">
      <tr>
        <th>Miembro</th>
        <th>Posici&oacute;n</th>
        <th>Online</th>
        <th>Desconexi&oacute;n</th>
      </tr>
     </thead>

    <tbody>

    @foreach($seisMeses as $fila)
     <tr>
       <td><a href="https://www.ivao.aero/Member.aspx?Id={{$fila['vid']}}">{{$fila['name']}}</a></td>
       <td>{{$fila['callsign']}}</td>
       <td>{{obtenerHorasMinutos($fila['online'])}}</td>
       <td>{{$fila['dt']}} UTC</td>
      </tr>
    @endforeach

    </tbody>
 </table>

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