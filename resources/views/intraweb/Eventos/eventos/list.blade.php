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
                        
                        <h2>Eventos <small> Lista de Eventos</small></h2>

              @include('flash::message')
             <table class="table table-hover">
                  <thead class="thead-dark">
                      <tr class="bg-primary2">
                        <th style="text-align: center;">Evento</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>

                  @foreach($events as $event)
                    <tr>
                      <td style="text-align: center;"><img src="https://files.ar.ivao.aero/Eventos/Images/{{$event->file}}" alt="{{$event->name}}" style="max-height: 50%; max-width: 75%;" class="img-thumbnail"></td>
                      <td>@php echo date('d-m-Y H:i', strtotime($event->start_date)); @endphp UTC</td>
                      <td>@php echo date('d-m-Y H:i', strtotime($event->end_date)); @endphp UTC</td>
                      <td>
                      <a onClick="if(confirm('&iquest;Est&aacute; seguro de que quiere eliminar el evento?')) return true;" data-original-title="Eliminar" role="button" class="btn btn-danger" href="/intraweb/events/es/{{$event->id}}/delete">
                      Eliminar
                      </a>
                      </td>
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