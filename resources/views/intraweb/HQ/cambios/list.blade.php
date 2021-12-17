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
              
              <h2>HQ <small> Listar Acciones</small></h2>
               <br />
               
               Filtrar por Staff:
               <select onChange="StaffChange()" id="vid">
               <option value="-">Seleccionar...</option>
               @foreach($staffs as $staff)
               <option value="{{$staff->vid}}">{{$staff->name}}</option>
               @endforeach
               </select><br />
               
               Filtrar por Departamento:
               <select onChange="DepChange()" id="dep">
               <option value="-">Seleccionar...</option>
               @foreach($departamentos as $departamento)
               <option value="{{$departamento->department}}">{{$departamento->department}}</option>
               @endforeach
               </select><br /><br />
                <table class="table table-hover">
                  <thead class="thead-dark">
                      <tr class="bg-primary2">
                        <th>Fecha</th>
                        <th>VID</th>
                        <th>Acci&oacute;n</th>
                        <th>Direcci&oacute;n IP</th>
                      </tr>
                  </thead>
                <tbody>
                @foreach($cambios as $cambio)
                <tr>
                  <td>{{$cambio->date}}</td>
                  <td><strong>{{$cambio->vid}}</strong></td>
                  <td>{!! $cambio->action !!}</td>
                  <td><a data-toggle="tooltip" data-placement="bottom" title="{{$cambio->ip}}"><i class="fa fa-desktop" aria-hidden="true"></i></a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div class="text-center">        
              {{ $cambios->links() }}
              </div>

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