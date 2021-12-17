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

<h2>Tours <small> Division Experts</small><br />
                        <!-- <a style="float:right;" onClick="mostrarAJAX('Entrenamiento/CompletedTrainingsFilter.php', tooltip-demo')" data-original-title="Filtrar" role="button" class="btn btn-success btn-xs">Filtrar</a> -->
                        </h2>
                        
                        <div class="separacion-tablas"></div>

                        @include('flash::message')
                         <table class="table table-striped">

                          <thead class="thead-dark">
                                <tr>
                                  <th>Miembro</th>
                                  <th>Tours Terminados</th>
                                  <th>Validar</th>
                                </tr>
                             </thead>
                                
                             <tbody>
                  
                    @foreach($experts as $expert)
                    <tr>
                        <td><a href="https://www.ivao.aero/Member.aspx?Id={{$expert->vid}}">{{obtenerNombreUsuario($expert->vid)}}</a></td>
                        <td>{{$expert->tours}}</td>
                        @if($expert->checked)
                        <td><img alt="tick" src="/img/ico/tick-button.png" /></td>
                        @else
                        <td><a class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Validar Experto" href="/intraweb/tours/experts/{{$expert->vid}}/validate"><img alt="tick" src="/img/ico/tick.png" /></td>
                        @endif
                    </tr>           
                    @endforeach                
           </tbody>
       </table>
       {{ $experts->links() }}

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