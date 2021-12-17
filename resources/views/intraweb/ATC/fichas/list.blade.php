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
                    
              <h2>ATC <small> Fichas</small>
              <br />

              <a style="float:right; color: white;" data-original-title="Agregar Nuevo" href="/intraweb/atc/sheet/add" role="button" class="btn btn-success btn-lg">Agregar</a></h2>
               
              @include('flash::message')
              <table class="table table-hover">
              <thead class="thead-dark">
                <tr class="bg-primary2">
                  <th>ICAO</th>
                  <th>Nombre</th>
                  <th>FIR</th>
                  <th>Versi&oacute;n</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($sheets as $sheet)
                <tr>
                  <td>{{$sheet->icao}}</td>
                  <td>{{$sheet->city}} - {{$sheet->name}}</td>
                  <td>{{$sheet->fir}}</td>
                  <td>{{$sheet->version}}</td>
                  <td style="text-align:center">
                  <a onClick="if(! confirm('&iquest;Est&aacute; seguro que desea eliminar esta ficha?')) return false;" href="/intraweb/atc/sheet/{{$sheet->id}}/delete" data-original-title="Eliminar" role="button" class="btn btn-danger">
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