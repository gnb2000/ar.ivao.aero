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
                        
              <h2>Vacantes Actuales<a style="float:right; color: white;" data-original-title="Agregar Nuevo" href="/intraweb/staff/addVacancy" role="button" class="btn btn-success btn-lg">A g r e g a r</a></h2>
              <br>
               
              @include('flash::message')
              <table class="table table-hover">
              <thead class="thead-dark">
                <tr class="bg-primary2">
                  <th>Posici&oacute;n</th>
                  <th>Nombre</th>
                  <th>Departamento</th>
                  <th></th>
                  <th></th>
                  <th></th> 
                </tr>
              </thead>

              <tbody>
                @foreach($positions as $position)
                <tr>
                  <td>{{$position->Id}}</td>
                  <td><strong>{{$position->PosName}}</strong></td>
                  <td>{{$position->Dept}}</td>
                  <td style="text-align:center">
                  <a href="/intraweb/staff/{{$position->Id}}/deleteVacancy" data-original-title="Eliminar" role="button" class="btn btn-danger btn-xs" >
                  Eliminar
                  </a>
                  </td>
                  
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