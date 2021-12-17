@php
use App\Models\Award, App\Models\AwardToUser;
include($_SERVER['DOCUMENT_ROOT'].'/funciones.php');

$nombreRangoPiloto = obtenerRangoPiloto($user->pilot_rating); 
$nombreRangoATC = obtenerRangoATC($user->atc_rating); 

$birthday = date('d/m/Y', strtotime($user->birthday));

$NpoMember = $user->NpoMember == 1 ? 'Si' : 'No';
$HrPiloto = floor($user->HrPilot / 3600).' h '.floor(($user->HrPilot / 60) % 60).' min';
$HrControl = floor($user->HrControl / 3600).' h '.floor(($user->HrControl / 60) % 60).' min';

$login_first = $user->login_first;
$b2 = explode('-', $login_first);
$login_first = @$b2[2].'/'.@$b2[1].'/'.@$b2[0];

$login_last = $user->login_last;
$b2 = explode('-', $login_last);
$login_last = @$b2[2].'/'.@$b2[1].'/'.@$b2[0];
	
@endphp

@extends('template')

@section('titulo')
<title>Inicio :: IVAO Argentina</title>
@endsection

@section('contenido')     
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
<div class="container marketing">
	<div class="tooltip-web">
		<div class="tabla-novedades">
			<div class="row">
				<div class="col-md-2" align="center">
					<img src="/img/user/{{$user->vid}}.jpg" alt="User Pic" class="rounded-circle img-fluid image-circle-profile">
					<img src="/img/perfil/ivao.png" alt="IVAO" class="img-responsive">
				</div>

				<!-- /.col-md-2 -->
				<div class="col-md-5">
      				@include('flash::message')
					<h2 style="padding-left: 8px;"><i class="glyphicon glyphicon-user fa-fw"></i> {{$user->name}} {{$user->surname}}</h2>
					<hr>
					<table class="table table-user-information">
						<colgroup>
							<col style="width:40%">
							<col style="width:60%">
						</colgroup>
						<tbody>
							<tr>
								<td colspan="2"><img src="https://status.ivao.aero/R/{{$user->vid}}.png" alt="Estado"></td>
							</tr>
							<tr>
								<td><div class="horaperfil">{{$HrControl}}</div> Como Controlador</td>
								<td><div class="horaperfil">{{$HrPiloto}}</div> Como Piloto</td>
							<tr>
								<td><i class="fa fa-user fa-fw"></i> VID:</td>
								<td><a target="_blank" href="https://www.ivao.aero/Member.aspx?ID={{$user->vid}}">{{$user->vid}} <i class="fa fa-external-link"></i></a></td>
							</tr>
							<tr>
								<td><i class="fas fa-chart-pie fa-fw"></i> Divisi&oacute;n:</td>
								<td><img alt="ZZ" src="/img/flags/Division/16/{{$user->division}}.png" style="margin-top: -2.5px;"> <a target="_blank" href="https://www.ivao.aero/divisions/division.asp?Id={{$user->division}}">{{$user->division}}</a></td>
							</tr>
							<tr>
								<td><i class="fa fa-globe fa-fw"></i> País:</td>
								<td><img alt="ZZ" src="/img/flags/Division/16/{{$user->country}}.png" style="margin-top: -2.5px;"> {{$user->country}}</td>
							</tr>
							<tr>
								<td><i class="fab fa-skype fa-fw"></i> Discord:</td>
								<td>{{$user->discord}}</td>
							</tr>
							@if(count($staffMembers) > 0 || $user->id == $authUser->id)
								<tr>
									<td><i class="fa fa-envelope fa-fw"></i> Email:</td>
									<td>{{$user->email}} <i class="fa fa-eye-slash pull-right cursor" style="margin-top: 3px;" data-toggle="tooltip" data-placement="right" title="Este campo es solamente visible para el usuario y los administradores"></i></td>
								</tr>
								<tr>
									<td><i class="fa fa-birthday-cake fa-fw"></i> Nacimiento:</td>
									<td> {{$birthday}} <i class="fa fa-eye-slash pull-right cursor" style="margin-top: 3px;" data-toggle="tooltip" data-placement="right" title="Este campo es solamente visible para el usuario y los administradores"></i></td>
								</tr>
								<tr>
									<td><i class="fas fa-clock"></i> &Uacute;ltimo acceso:</td>
									<td> {{$login_last}} </td>
								</tr>
								<tr>
									<td><i class="fa fa-desktop fa-fw"></i> Última IP:</td>
									<td>{{$user->ip_last}} <i class="fa fa-eye-slash pull-right cursor" style="margin-top: 3px;" data-toggle="tooltip" data-placement="right" title="Este campo es solamente visible para el usuario y los administradores"></i></td>
								</tr>
								<tr>
									<td><i class="fa fa-desktop fa-fw"></i> IP de Registro:</td>
									<td> {{$user->ip_reg}} <i class="fa fa-eye-slash pull-right cursor" style="margin-top: 3px;" data-toggle="tooltip" data-placement="right" title="Este campo es solamente visible para el usuario y los administradores"></i></td>
								</tr>
							@endif
							<!--
								<tr>
								  <td><i class="fa fa-headphones fa-fw"></i> GCA:</td>
								  <td><span class="label label-success" data-toggle="tooltip" data-placement="bottom" title="Guest Controller Approval">ACTIVO</span></td>
								</tr>
								<tr>
								  <td><i class="fa fa-plane fa-fw"></i> AR Elite Pilots:</td>
								  <td><a href="http://portal.ar.ivao.aero/login/piloto/detalles.php">Piloto Certificado <i class="fa fa-link"></i></a><br><br><img src="http://ar.ivao.aero/portal/images/perfil/arpilots/7.png" style="margin-left: 3px; border-radius: 5%;" alt="AR Pilots" data-toggle="tooltip" data-placement="bottom" title="Instructor">
								</td>
								</tr>
								-->
							<tr>
								<td><i class="fa fa-comments fa-fw" data-toggle="tooltip" data-placement="left" title="Comentarios STAFF"></i> STAFF:</td>
								<td>{{$user->obs_staff}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-comment fa-fw" data-toggle="tooltip" data-placement="left" title="Comentarios {{$user->name}} {{$user->surname}}"></i> Usuario:</td>
								<td>{{$user->obs_user}}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /.col-md-5 -->
				<div class="col-md-5">
					<div style="padding-top: 21px;"></div>
					<table class="table table-user-information">
						<tbody>
							<tr>
									<td><img class="cursor" src="https://www.ivao.aero/data/images/ratings/pilot/{{$user->pilot_rating}}.gif" alt="PP" data-toggle="tooltip" data-placement="bottom" title="{{$nombreRangoPiloto}}"></td>
									                        <td><img class="cursor" src="https://www.ivao.aero/data/images/ratings/atc/{{$user->atc_rating}}.gif" alt="ADC" data-toggle="tooltip" data-placement="bottom" title="{{$nombreRangoATC}}"></td>
									@if($user->NpoMember == 1)
										<td><img src="https://www.ivao.aero/data/images/awards/ME.gif" alt="Miembro de la Asamblea General" data-toggle="tooltip" data-placement="bottom" title="Miembro Efectivo"></td>
									@endif
									
									
							</tr>
							@if(count($staffMembers) != 0)
								<tr>
								<td colspan="3"><h2><small>STAFF</small></h2></td>
								</tr>
								<tr>
								@foreach($staffMembers as $sm)
									@php
									$pos = explode("-", $sm->position);
									@endphp
									
									<td>
									<a href="https://www.ivao.aero/staff/details.asp?Id=AR-{{$pos[1]}}" target="ext"><img src="/img/perfil/staff/{{$pos[1]}}.png" alt="STAFF" data-toggle="tooltip" data-placement="bottom" title="{{$sm->full_position}} - Argentina"></a>
									</td>
								@endforeach
								</tr>
							@endif
							<tr>
							
					        @if(count($meritos) != 0)
					            <td colspan="3"><h2><small>DISTINCIONES DIVISIONALES</small></h2></td></tr>
					            @for($i = 0; $i < count($meritos); $i++)
					                @php
					                $inicio = $i * 3;
					                $medallas = AwardToUser::where('vid', $user->vid)
					                						->offset($inicio)
					                						->limit(3)
					                						->get();

					                @endphp                                
					                <tr>
					                @foreach($medallas as $medalla)
					                	@php
					                    $codigo = $medalla->award;
					                    $award = Award::where('code', $codigo)->first();
					                    $AwDate = $medalla->date;
					                    $AwD = explode('-', $AwDate);
					                    $AwDate = $AwD[2].'/'.$AwD[1].'/'.$AwD[0];
					                    @endphp

					                    <td>
			                            <img class="cursor" src="/img/medallas/{{$codigo}}.png" 
			                            alt="{{$award->name}}" 
			                            data-html="true" 
			                            data-content="<strong>Fecha:</strong> {{$AwDate}}<br /><strong>Emisor:</strong> {{$award->source}}<br /><strong>Comentarios:</strong> {{$award->comments}}" 
			                            data-placement="bottom" 
			                            data-toggle="popover" 
			                            data-trigger="hover" 
			                            data-container="body" 
			                            data-original-title="{{$award->name}}" 
			                            title="">
					                    </td>
					                @endforeach
					                </tr>
					            @endfor
					        @endif
							
							@if(count($points) != 0)
								<tr>
								<td colspan="3"><h2><small>PUNTOS PARA DISTINCIONES</small></h2></td>
								</tr>
								<tr>							
								@foreach($points as $point)
									@if($point->type == 'p')
										<td>
											<div class="horaperfil">{{$point->points}}</div> Pilot Support Award
										</td>
									@elseif($point->type == 'a')
										<td>
											<div class="horaperfil">{{$point->points}}</div> ATC Support Award
										</td>
									@endif
								@endforeach
								</tr>
							@endif
									
						</tbody>
					</table>
					<div style="margin-top: 13px; margin-bottom: 18px;"></div>
					<table class="table table-user-information" style="margin-top:5px;">
						<tbody>
							<tr>
							@if ($user->ivao_rating == 0)
							<td colspan="3" class="alert-danger">Usuario Suspendido</td>
							@elseif ($user->ivao_rating == 1)
							<td colspan="3" class="alert-info">Usuario Inactivo</td>
							@elseif ($user->ivao_rating == 3)
							<td colspan="3" class="alert-info">En Memoria</td>
							@elseif ($user->ivao_rating == 11)
							<td colspan="3" class="alert-success">Usuario Activo</td></tr>
							<tr><td colspan="3" class="alert-danger">IVAO Supervisor</td>
							@elseif ($user->ivao_rating == 12)
							<td colspan="3" class="alert-success">Usuario Activo</td></tr>
							<tr><td colspan="3" class="alert-danger">IVAO Administrator</td>
							@else
							<td colspan="3" class="alert-success">Usuario Activo</td>
							@endif
							</tr>
							@if(count($staffMembers) != 0)
							
								@if($isADM)
									<tr><td style="background-color: #E7ECF7; color: #2A4982;" colspan="3" class="bg-ivao text-ivao administrador"><span style="font-size: 17px;">Administrador</span></td></tr>
								@endif
									<tr><td style="background-color: #E7ECF7; color: #2A4982;" colspan="3" class="bg-ivao text-ivao staff"><span style="font-size: 17px;">STAFF</span></td></tr>
							@endif 
														
						</tbody>
					</table>
				</div>
				<!-- /.col-md-5 -->
			</div>
			<!-- /.row -->
			@if(!Auth::check())
 
		      	<div class="tabla-footer">
		
		            <div class="row" style="margin-bottom: -10px;">
		                <div class="col-md-6"></div>
		                <div class="col-md-6">
						<p class="pull-right">
						<a href="index.php?pagina=login/editar" type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square txt-green"></i> &nbsp; Editar</a>
						<a href="https://www.ivao.aero/admin/susphistory.asp?Id={{$user->vid}}" target="ext" type="button" class="btn btn-default btn-sm"><i class="fa fa-ban txt-red"></i> &nbsp; Suspensiones</a>
						</p>
			@else
				<p class="pull-right">
				<a href="/editar-perfil" type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square txt-green"></i> &nbsp; Editar</a>
				<a href="https://www.ivao.aero/admin/susphistory.asp?Id={{$user->vid}}" target="ext" type="button" class="btn btn-default btn-sm"><i class="fa fa-ban txt-red"></i> &nbsp; Suspensiones</a>
				</p>
			@endif
	</div>
</div>
<!-- /.tabla-footer -->
</div><!-- /.tabla-novedades-->
</div><!-- /.tooltip-web -->
</div><!-- /.container -->
</section>
@endsection