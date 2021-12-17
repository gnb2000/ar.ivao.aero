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
                        
              <h2>Vuelo <small> Aerol&iacute;neas Virtuales</small>
               
              <a style="float:right; color: white;" data-original-title="Agregar Nueva" href="/intraweb/va/add" role="button" class="btn btn-success btn-lg">Agregar</a></h2>
              <br>              @include('flash::message')
              <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>ID</th>
                  <th>ICAO</th>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th>Tipo</th>
                  <th></th> 
                </tr>
              </thead>

              <tbody>
                @foreach($VAs as $VA)
                  @php
                  $estado = $VA->VaStatus == 1 ? '<span class="label label-success">Activa</span>' : '<span class="label label-danger">Inactiva</span>';
                  $tipo = $VA->VaType == 1 ? 'VA' : 'SOG';

                  $botonActivar = $VA->VaStatus == 0 ? '<a href="/intraweb/va/'.$VA->IVAOId.'/activate" onClick="if(! confirm(\'&iquest;Est&aacute; seguro que desea activar esta VA?\')) return false;" class="btn btn-default btn-xs" id="myButton" data-toggle="tooltip" data-placement="bottom" title="Activar VA"><img src="http://www.ar.ivao.aero/img/ico/pencil--plus.png"></a>' : '<a href="/intraweb/va/'.$VA->IVAOId.'/deactivate" onClick="if(! confirm(\'&iquest;Est&aacute; seguro que desea desactivar esta VA?\')) return false;" class="btn btn-default btn-xs" id="myButton" data-toggle="tooltip" data-placement="bottom" title="Desactivar VA"><img src="http://www.ar.ivao.aero/img/ico/pencil--minus.png"></a>';

                  $botonLast = $botonActivar.' <a href="/intraweb/va/'.$VA->IVAOId.'/delete" onClick="if(! confirm(\'&iquest;Est&aacute; seguro que desea eliminar esta VA?\')) return false;" class="btn btn-default btn-xs" id="myButton" data-toggle="tooltip" data-placement="bottom" title="Eliminar VA"><img src="http://www.ar.ivao.aero/img/ico/cross-circle.png"></a>'; //Mostramos los botones Activar, Inactivar y Eliminar
                  @endphp
                <tr>
                  <td>{{$VA->IVAOId}}</td>
                  <td>{{$VA->ICAO}}</td>
                  <td>{{$VA->VaName}}</td>
                  <td style="text-align:center">{!! $estado !!}</td>
                  <td>{{$tipo}}</td>
                  <td>{!! $botonLast !!}</td>
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