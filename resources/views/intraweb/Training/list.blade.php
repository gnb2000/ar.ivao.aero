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

                        <h2>Entrenamiento <small> Entrenamientos Completados</small><br />
                        <!-- <a style="float:right;" onClick="mostrarAJAX('Entrenamiento/CompletedTrainingsFilter.php', tooltip-demo')" data-original-title="Filtrar" role="button" class="btn btn-success btn-xs">Filtrar</a> -->
                        </h2>
                        
                        <div class="separacion-tablas"></div>
                          
                        @include('flash::message')
                         <table class="table table-striped">

                            <thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <th>C&oacute;digo</th>
                                  <th>Miembro</th>
                                  <th>Entrenador</th>
                                  <th>Realizado</th>
                                  <th>Comentarios</th>
                                  <th></th>
                                </tr>
                             </thead>
                                
                             <tbody>
                  
                  @if($atcs->count() > 0) 
                  <!-- Si hay trainings de ATC, mostramos el titulo de la seccion y mostramos los trainings -->
                    <tr class="py-0">
                      <td></td>
                      <td colspan="5"><h4>ATC <small>ADC / APC / ACC / SC</small></h4></td>
                    </tr>
                                
                    @foreach($atcs as $atc)
                    <tr>
                       <td>TGA{{$atc->id}}</td>
                       <td><a href="https://www.ivao.aero/Member.aspx?Id={{$atc->member}}">{{obtenerNombreUsuario($atc->member)}}</a></td>
                       <td><a href="https://www.ivao.aero/Member.aspx?Id={{$atc->trainer}}">{{obtenerNombreUsuario($atc->trainer)}}</a></td>
                       <td>{{$atc->training_date}}</td>
                       <td>{{$atc->comments}}</td>
                       <td><a href="{{$atc->url}}" data-toggle="tooltip" data-placement="bottom" title="Counting Sheet"><img alt="sheet" src="http://www.ar.ivao.aero/img/ico/book-open-list.png"></a></td>
                    </tr>           
                    @endforeach 
                  @endif
                                
                  

                  @if($pilotos->count() > 0) 
                  <!-- Si hay trainings de Piloto, mostramos el titulo de la seccion y mostramos los trainings -->
                  
                  <tr class="bg-primary3">
                       <td></td>
                       <td colspan="5"><h4>Piloto <small>PP / SPP / CP / ATP</small></h4></td>
                  </tr>
                                
                    @foreach($pilotos as $piloto)
                    <tr>
                       <td>TGP{{$piloto->id}}</td>
                       <td><a href="https://www.ivao.aero/Member.aspx?Id={{$piloto->member}}">{{obtenerNombreUsuario($piloto->member)}}</a></td>
                       <td><a href="https://www.ivao.aero/Member.aspx?Id={{$piloto->trainer}}">{{obtenerNombreUsuario($piloto->trainer)}}</a></td>
                       <td>{{$piloto->training_date}}</td>
                       <td>{{$piloto->comments}}</td>
                       <td>-</td>
                    </tr>              
                    @endforeach 
                  @endif   

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