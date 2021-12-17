@extends('template')

@php include($_SERVER['DOCUMENT_ROOT'].'/funciones.php'); @endphp

@section('titulo')
<title>Inicio :: IVAO Argentina</title>
@endsection

@section('contenido')     
      <!-- Inicio
         ================================================== -->
      <!-- CONTENIDO DE LA PÁGNA -->
      	<section>
		<div class="container marketing">
         <div class="row">
            <div style="border-top-width: 4px;" class="col-3 text-center">
					<div class="card bg-light text-center mr-4 mb-4">
						<div class="p-4 card-header">
               		<h2 style="color: #EAAF0F !important;"><i class="fas fa-bookmark"></i> Atajos</h2>
						</div>
						<div class="card-body">
	                  <a href="https://www.ivao.aero/members/person/register.htm" target="_blank"  data-toggle="tooltip" data-placement="right" title="Registrate en IVAO"><img src="/img/atajo_unite.jpg" class="pt-2 img-thumbnail"></a>
	                  
					  		<a href="https://www.ivao.aero/training/training/statustraining.asp" target="_blank" data-toggle="tooltip" data-placement="right" title="Solicitar Entrenamiento"><img src="/img/atajo_training.jpg" class="pt-2 img-thumbnail"></a>
	                  
	                  <a target="_blank" href="https://discord.gg/ay6h4SA63n" data-toggle="tooltip" data-placement="right" title="Accede a Discord"><img src="/img/atajo_discord.jpg" class="pt-2 img-thumbnail"></a>
	                  
	                  <a href="/recursos/infovuelos"  data-toggle="tooltip" target="_blank" data-placement="right" title="Información de Vuelos"><img src="/img/atajo_infovuelos.jpg" class="pt-2 img-thumbnail"></a>
	                  
	                  <a href="/recursos/aip" data-toggle="tooltip" data-placement="right" target="_blank" title="Descarga de Cartas AIP"><img src="/img/atajo_cartas.jpg" class="pt-2 img-thumbnail"></a>
	                  
	                  <a href="https://squawk.scumari.nl/index.php" target="_blank" data-toggle="tooltip" data-placement="right" title="Generador de Transponder"><img src="/img/atajo_tcg.jpg" class="pt-2 img-thumbnail"></a>
						</div>
					</div>
         	</div><!-- /.col-3 -->

            <!-- Inicio Tabla #2 -->
            <div class="col-6 text-center">
            	@include('flash::message')
               <div class="row">
               <div class="col">
               <div class="card bg-light text-center mr-4 mb-4">
						<div class="card-header">
                  	<h2 style="color: #00B28C !important;"><i class="far fa-newspaper"></i> Novedades</h2>
						</div>
						<div class="card-body">
							<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-inner">
								<?php $active="active" ?>
								@if ( !$nextEvents->isEmpty())
									<!-- Next Events -->
									@foreach ($nextEvents as $event)
										<div class="carousel-item {{ $active }}" >
											<a href="{{ $event->urlforo }}" target="_blank"><img alt="{{ $event->name }}" src="https://files.ar.ivao.aero/Eventos/Images/Banners/{{$event->year}}/Thumb/{{$event->image}}" class="img-thumbnail"></a>
										</div>
										<?php $active="" ?>
									@endforeach
								@else
									<!-- Tours -->
									@foreach ($tours as $tour)
										<div class="carousel-item {{ $active }}" >
											<a href="https://ters.ar.ivao.aero/tours" target="_blank"><img alt="tours" src="https://files.ar.ivao.aero/Eventos/Images/Banners/{{$tour->year}}/Thumb/{{$tour->image}}" class="my-auto card-img img-thumbnail d-block w-100"></a>
										</div>
										<?php $active="" ?>
									@endforeach
								@endif
								</div>
								<a class="carousel-control-prev" role="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</a>
								<a class="carousel-control-next" role="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</a>
							</div>
						</div>
					</div>
	      		</div>
					</div> <!-- /.row -->
               
               <!-- NOTAMS -->
               <div class="row">
               <div class="col">
					<div class="card bg-light text-center mr-4 mb-4">
						<div class="card-header">
                  	<h2 style="color: #00B28C !important;"><i class="fas fa-comment"></i> Notams</h2>
						</div>
						<div class="card-body">
						  <marquee scrolldelay="600" direction="up">
							@if(count($notams) > 0)
								@foreach($notams as $notam)
									<p>{{$notam['description']}}</p>
								@endforeach
							@else 
								<p>NO NOTAMS AVAILABLE</p>
							@endif
						  </marquee>
						</div>
					</div>
			   </div>
				</div> <!-- /.row -->
               
           	<!-- INICIO FACEBOOK -->
            <div class="row">
            <div class="col">
					<div class="card bg-light text-center mr-4 mb-4">
						<div class="card-header">
               		<h2 style="color: #2A4982"><i class="fab fa-facebook"></i> Facebook</h2>
						</div>
						<div class="card-body">
							<div id="fb-root"></div>
							<script async>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=230249113809198";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));
							</script>
							<div class="fb-page" data-href="https://www.facebook.com/ivaoargentina/" data-tabs="timeline" data-width="420" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ivaoargentina/"><a href="https://www.facebook.com/ivaoargentina/">IVAO Argentina</a></blockquote></div>
						</div>
					</div>
				</div>	
            </div>
       	 	</div>
            <!-- FINAL FACEBOOK -->
			</div>
           
            <!-- INICIO AGENDA -->
            <div class="col-3 text-center">
            	<div class="row">
            	<div class="col">
               	<div class="card bg-light text-center mr-4 mb-4">
						<div class="card-header">
                		<h2 style="color: #2A4982"><i class="fas fa-calendar-alt"></i> Agenda</h2>
						</div>
						<div class="card-body">
	          			<ul class="list-unstyled" style="margin:10px">

								@if($evento == NULL && $training == NULL && $examen == NULL)
								
									<h5 class="text-center">No hay pr&oacute;ximos eventos.</h5>
								
								@else
									@if($evento != NULL)
										@php
										$dia = date('d', strtotime($evento->start_date));
										$nombreDia = obtenerNombreDia( date('N', strtotime($evento->start_date)) );
										$hora = date('H:i', strtotime($evento->start_date));
										@endphp
										
										<li>
											<div class="row">
												<div class="col-6">
													<div class="card bg-light text-center mr-4">
														<div class="p-4 card-header">
															<span class="card-title text-primary strong">
																{{$nombreDia}}
															</span>
														</div>
														<div class="p-0 card-body text-info">
															{{$dia}}
														</div>
													</div>
												</div>
												<div class="col-6">
													<h5 style="color: #2A4982;" class="mt-0">
														<a href="https://ters.ar.ivao.aero/events/{{$evento->id}}" style="color: #2A4982;">{{$evento->name}}</a>
													</h5>
													<p> {{$hora}} UTC </p>
												</div>
											</div>
										</li>
									@endif

									@if($examen != NULL)
										@php
										$dia = date('d', strtotime($examen->date));
										$nombreDia = obtenerNombreDia( date('N', strtotime($examen->date)) );
										$hora = date('H:i', strtotime($examen->date));
										$position = $examen->position;
										@endphp

										<li>
											<div class="row">
												<div class="col-md-6">
													<div class="card bg-light text-center mr-4">
														<div class="p-4 card-header">
															<span class="card-title text-primary strong">
																{{$nombreDia}}
															</span>
														</div>
														<div class="p-0 card-body text-info">
															{{$dia}}
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<h5 style="color: #2A4982;" class="mt-0">
													@php
													echo 'Examen '.obtenerRangoAtcShort($examen->exam + 1);
													@endphp
													</h5>
													<p> {{$hora}} UTC - {{$position}} </p>
												</div>
											</div>
										</li>
									@endif

									@if($training != NULL)
										@php
										$dia = date('d', strtotime($training->training_date));
										$nombreDia = obtenerNombreDia( date('N', strtotime($training->training_date)) );
										$hora = date('H:i', strtotime($training->training_date));
										$position = $training->atc_position;
										@endphp

										<li>
											<div class="row">
												<div class="col-md-6">
													<div class="card bg-light text-center mr-4">
														<div class="p-4 card-header">
															<span class="card-title text-primary strong">
																{{$nombreDia}}
															</span>
														</div>
														<div class="p-0 card-body text-info">
															{{$dia}}
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<h5 style="color: #2A4982;" class="mt-0">
													@php
													echo 'Entrenamiento '.$training->rating;
													@endphp
													</h5>
													<p> {{$hora}} UTC - {{$position}} </p>
												</div>
											</div>
										</li>
									@endif
								@endif
                </ul>

                 <a href="/comunidad/calendario" class="btn btn-default btn-block">Ver Todos »</a>
						</div>
					</div>
				</div>
				</div>
                              
            <!-- INICIO TOP5 -->
            <div class="row">
            <div class="col">
					<div class="card bg-light text-center mr-4 mb-4">
						<div class="card-header">
		            	<h2><i class="fas fa-award"></i> TOP 5 ATCs <?php echo '('.date('m').'/'.date('Y').')'; ?></h2>
						</div>
						<div class="card-body">
               		<?php echo file_get_contents('https://ar.ivao.aero/top-five'); ?>
						</div>
					</div>
				</div>
    			</div>
            <!-- FINAL TOP5 -->


            <!-- INICIO STAFF -->
             <div class="row">
            	<div class="col">
						<div class="card bg-light text-center mr-4">
							<div class="p-4 card-header">
								<h2><i class="fas fa-user-friends"></i> STAFF ONLINE</h2>
							</div>
							<div class="p-0 card-body">
		                  <!-- Include del Staff Online -->
		                  <?php include($_SERVER['DOCUMENT_ROOT']."/elements/staff.inc.php");?>
							</div>
						</div>	                 
       	   	</div>
    		   </div> <!-- /.row -->

				<!-- ATC Scheduling -->
				{{-- <div class="pt-4 mt-4 border-top row">
					<h2 style="color: #2A4982"><i class="fas fa-radar"></i> Reservas ATC (UTC)</h2>
					<div class="espaciado-tabla-novedades"></div>
					<div class="accordion accordion-flush" id="accordionFlushExample">
						<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
							HOY
							</button>
						</h2>
						<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">VID</th>
											<th scope="col">Position</th>
											<th scope="col">Start time</th>
											<th scope="col">End time</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($today_scheduling as $index->$schedule)
											<tr>
												<th scope="row">{{$loop->index}}</th>
												<td>{{$schedule[0]}}</td>
												<td>{{$schedule[1]}}</td>
												<td>{{$schedule[2]}}</td>
												<td>{{$schedule[3]}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						</div>
						<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
							SIGUIENTES
							</button>
						</h2>
						<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body">
								<div class="table-responsive">
									<table class="table">
										<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">VID</th>
											<th scope="col">Posicion</th>
											<th scope="col">Fecha</th>
											<th scope="col">Hora inicio</th>
											<th scope="col">Hora fin</th>
	
										</tr>
										</thead>
										<tbody>
											
											@foreach ($next_scheduling as $schedule)
												<tr>
													<th scope="row">{{$loop->index}}</th>
													<td>{{$schedule[0]}}</td>
													<td>{{$schedule[1]}}</td>
													<td>{{$schedule[4]}}</td>
													<td>{{$schedule[2]}}</td>
													<td>{{$schedule[3]}}</td>
	
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>

							</div>
						</div>
						</div>
					</div>
				
				</div> --}}
            </div>
            <!-- /.col-3 -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.CONTAINER MARKETING -->
</section>
@endsection