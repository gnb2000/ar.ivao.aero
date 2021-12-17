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
          
<h2>Validar <small> Lista de miembros</small></h2>
           
<div class="separacion-tablas"></div>           

@include('flash::message')
<div style="margin-top: 15px;"></div>
 <table class="table table-hover">
    <thead class="thead-dark">
        <tr class="bg-primary2">
          <th>VID</th>
          <th>Nombre</th>
          <th>Registro</th>
          <th></th>
          <th></th> 
        </tr>
    </thead>
      <tbody>
      @foreach($users as $user)
      <tr>
          <td>{{$user->vid}}</td>
          <td class="font-weight-bold">{{$user->name}} {{$user->surname}}</td>
          <td>{{$user->login_first}}</td>
          <td class="text-center">
            <a href="/intraweb/members/{{$user->vid}}/activate" onClick="if(!confirm('&iquest;Est&aacute; seguro que desea validar esta cuenta?')) return false;" data-toggle="tooltip" data-placement="bottom" title="Validar" class="btn btn-default">
            <img src="http://www.ar.ivao.aero/img/ico/tick.png" />
            </a>
            <a href="/intraweb/members/{{$user->vid}}/validatedelete" onClick="if(!confirm('&iquest;Est&aacute; seguro que desea eliminar esta cuenta?')) return false;" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
            <img src="http://www.ar.ivao.aero/img/ico/cross-circle.png" />
            </a> 
          </td>
          <td>{{$user->permisos}}</td>
      </tr>
      @endforeach
     </tbody>
 </table>
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