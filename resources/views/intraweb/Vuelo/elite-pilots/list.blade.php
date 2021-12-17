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
        
         		@php
            include($_SERVER['DOCUMENT_ROOT'].'/intranet/menu_intraweb.php');
            include($_SERVER['DOCUMENT_ROOT'].'/funciones.php');
            @endphp
        
        </div><!-- /.col-md-3 -->
        
  		<div class="col-md-9">

        <div class="tooltip-demo">
        

                      <!-- INICIO CONTENIDO -->
                        
              <h2>Vuelo <small> Elite Pilots</small></h2>
               
              <a style="float:right; color: white;" data-original-title="Agregar Nueva" href="/intraweb/elite/add" role="button" class="btn btn-success btn-lg">Agregar</a>
              <br>

              @include('flash::message')
              <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                    <th>Callsign</th>
                    <th>VID</th>
                    <th></th>
                </tr>
              </thead>

              <tbody>
                  @foreach($pilots as $pilot)
                  <tr>
                    <td>{{$pilot->Callsign}}</td>
                    <td><a href="https://www.ivao.aero/Member.aspx?ID={{$pilot->VID}}">{{obtenerNombreUsuario($pilot->VID)}}</a></td>
                    <td><a href="/intraweb/elite/{{$pilot->VID}}/delete" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</a></td>
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