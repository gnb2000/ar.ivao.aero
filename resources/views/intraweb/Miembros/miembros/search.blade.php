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
          
@if(isset($enviar) && $enviar == 1)
<table class="table table-hover">
      <thead class="thead-dark">
      <tr class="bg-primary2">
        <th>VID</th>
        <th>Nombre</th>
        <th>Consentimiento Discord</th>
        <th>Alta</th>
        <th>&Uacute;ltimo Login</th>
        <th>Estado</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($miembros as $miembro)
      @php
      $estado = $miembro->active == 1 ? '<span class="badge badge-success">Activo</span>' : $estado = '<span class="label label-danger">S/V</span>';
      @endphp
      <tr class="text-center">
          <td>{{$miembro->vid}}</td>
          <td>{{$miembro->name}} {{$miembro->surname}}</td>
          <td>@php echo $miembro->consent == 1 ? '<img src="http://www.ar.ivao.aero/img/ico/tick-circle.png" />' : '<img src="http://www.ar.ivao.aero/img/ico/cross-circle.png" />'; @endphp</td>
          <td>{{$miembro->login_first}}</td>
          <td>{{$miembro->login_last}}</td>
          <td>{!! $estado !!}</td>
          <td>
            <a href="/intraweb/members/{{$miembro->vid}}/edit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar Miembro">
            <img src="http://www.ar.ivao.aero/img/ico/pencil.png" />
            </a> 
          @if($miembro->active == 0)
            <a href="/intraweb/members/{{$miembro->vid}}/activate" class="btn btn-default"  data-toggle="tooltip" data-placement="bottom" title="Activar Cuenta">
                <img src="https://ar.ivao.aero/img/ico/stamp--plus.png" />
            </a>
          @endif
            <a href="/intraweb/members/{{$miembro->vid}}/searchdelete" onclick="if(!confirm('&iquest;Est&aacute; seguro de que desea eliminar este miembro?')) return false;" class="btn btn-default"  data-toggle="tooltip" data-placement="bottom" title="Eliminar Miembro">
            <img src="http://www.ar.ivao.aero/img/ico/cross-circle.png">
            </a>
          </td>
      </tr>
    @endforeach
    </tbody>
</table>

@else

@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('UserController@search')}}" method="post" role="form">
  @csrf

<fieldset>
<h2>Miembros <small> Buscar</small></h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="search">Buscar</label>  
  <div class="col-md-8">
  <input id="seacrh" name="search" placeholder="" class="form-control input-md" type="text">
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="campo"></label>
  <div class="col-md-8"> 
    <label class="radio-inline" for="campo-0">
      <input name="campo" id="campo-0" value="vid" checked="checked" type="radio">
      VID
    </label> 
    <label class="radio-inline" for="campo-1">
      <input name="campo" id="campo-1" value="nombre" type="radio">
      Nombre
    </label> 
    <label class="radio-inline" for="campo-2">
      <input name="campo" id="campo-2" value="apellido" type="radio">
      Apellido
    </label> 
    <label class="radio-inline" for="campo-3">
      <input name="campo" id="campo-3" value="email" type="radio">
      Email
    </label> 
    <label class="radio-inline" for="campo-4">
      <input name="campo" id="campo-4" value="ip" type="radio">
      IP
    </label>
  </div>
</div>

<div class="form-group col-md-4">
    <button name="enviar" type="submit" class="btn btn-success">Buscar</button>
</div>

</fieldset>
          
</form>
@endif
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