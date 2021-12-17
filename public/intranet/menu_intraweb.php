<?php
$vid = $user->vid; 

$ShowHQ = $ShowATC = $ShowEVENT = $ShowMEMBER = $ShowFIR = $ShowFLIGHT = $ShowPRD = $ShowSO = $ShowTRAINING = 0;

foreach($staffMembers as $member)
{
	if($member->department=='HQ') $ShowHQ = 1;
	if($member->department=='ATC') $ShowATC = 1;
	if($member->department=='EVENT') $ShowEVENT = 1;
	if($member->department=='MEMBER') $ShowMEMBER = 1;
	if($member->department=='FIR') $ShowFIR = 1;
	if($member->department=='FLIGHT') $ShowFLIGHT = 1;
	if($member->department=='PRD') $ShowPRD = 1;
	if($member->department=='SO') $ShowSO = 1;
	if($member->department=='TRAINING' and $member->rank == 1) $ShowTRAINING = 1;
	else if($member->department=='TRAINING' and $member->rank == 2) $ShowTRAINING = 2;
	else if($member->department=='TRAINING' and $member->rank >= 3) $ShowTRAINING = 3;
}
?>
            <div class="accordion" id="accordion">
			<?php if($ShowHQ || $isADM){ ?>
                <div class="card bg-light">
                    <div class="card-header py-0">
                        <h4 class="card-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-gavel" aria-hidden="true"></i> Direcci&oacute;n</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="collapse show">
                        <div class="card-body py-0">
                            <table class="table">
                                <tr>
                                    <td>
                                        <i class="fa fa-list-alt" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/staff/list"> Administrar Staff</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-user-plus" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/staff/listVacancy"> Gestionar Vacantes </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-history" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/staff/0/changes"> Registro de Cambios </a>
                                    </td>
                                </tr>
                                <tr>
								<tr>
                                    <td>
                                         <i class="fa fa-plus-circle" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/staff/meeting"> Nueva reuni&oacute;n</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
				<?php } if($ShowATC|| $ShowFIR || $isADM){ ?>
                <div class="card bg-light">
                    <div class="card-header py-0">
                        <h4 class="card-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-headphones" aria-hidden="true"></i> Ops. ATC</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="collapse">
                        <div class="card-body py-0">
                            <table class="table">
								<tr>
                                    <td>
                                        <i class="far fa-chart-bar" aria-hidden="true" style="color:#a94442"></i><a style="color:#a94442" href="/intraweb/atc/stats/list"> Actividad de Control</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="far fa-chart-bar" aria-hidden="true" style="color:#a94442"></i><a style="color:#a94442" href="/intraweb/atc/FIRstats/list"> Actividad FIR-CH</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="far fa-chart-bar" aria-hidden="true" style="color:#a94442"></i><a style="color:#a94442" href="/intraweb/atc/ATCFIRstats/list"> Actividad ATC FIR</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-list" aria-hidden="true" style="color:#a94442"></i><a style="color:#a94442" href="/intraweb/atc/fra/list"> Gestionar Freqs</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <i class="far fa-file-pdf" aria-hidden="true" style="color:#a94442"></i><a style="color:#a94442" href="/intraweb/atc/sheet/list"> Gestionar Fichas</a>
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                        <i class="far fa-address-card" style="color:#a94442" aria-hidden="true"></i><a style="color:#a94442" href="/intraweb/atc/gca"> GCA</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                				<?php } if($ShowFLIGHT || $isADM){ ?>
                <div class="card bg-light">
                    <div class="card-header py-0">
                        <h4 class="card-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><i class="fa fa-plane" aria-hidden="true"></i> Ops. de Vuelo</a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="collapse">
                        <div class="card-body py-0">
                            <table class="table">
                                <tr>
                                    <td>
                                        <i class="far fa-chart-bar" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/flight/stats"> Estad&iacute;sticas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <i class="far fa-clock" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/flight/hourlyStats"> Vuelos por hora</a>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                         <i class="far fa-calendar" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/flight/va/participation"> Participaci&oacute;n de VAs</a>
                                    </td>
                                </tr> -->
								<tr>
                                    <td>
                                         <i class="far fa fa-cogs" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/va/list"> Gestionar VAs</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <i class="fa fa-list" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/elite/list"> Gestionar Elite Pilos</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                				<?php } if($ShowSO || $isADM){ ?>
                <div class="card bg-light">
                    <div class="card-header py-0">
                        <h4 class="card-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSO"><i class="fa fa-plane" aria-hidden="true"></i> Ops. Especiales</a>
                        </h4>
                    </div>
                    <div id="collapseSO" class="collapse">
                        <div class="card-body py-0">
                            <table class="table">
 								<tr>
                                    <td>
                                        <i class="fa fa-upload" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/events/addBanner"> Subir Banner</a>
                                    </td>
                                </tr>
                               <tr>
                                    <td>
                                        <i class="fa fa-plus-circle" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/so/addEvent"> Nuevo Evento</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
				<?php } if($ShowEVENT || $isADM){ ?>
                <div class="card bg-light">
                    <div class="card-header py-0">
                        <h4 class="card-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-calendar" aria-hidden="true"></i> Eventos</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="collapse">
                        <div class="card-body py-0">
                            <table class="table">
                                <tr>
                                    <td>
                                        <i class="fa fa-list" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/events/list"> Listar Eventos</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-list" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/events/listEN"> Listar Eventos (Inglés)</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="far fa fa-cogs" aria-hidden="true" style="color:#999999"></i><a target="_blank" href="https://ters.ar.ivao.aero"> TERS</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="far fa-chart-bar" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/events/stats"> Estad&iacute;sticas</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
				<?php } if($ShowMEMBER || $isADM){ ?>
                <div class="card bg-light">
                    <div class="card-header py-0">
                        <h4 class="card-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-users" aria-hidden="true"></i> Miembros</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="collapse">
                        <div class="card-body py-0">
                            <table class="table">
                                <tr>
                                    <td>
                                       <i class="fas fa-cloud-upload-alt" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/stats/upload"> Cargar Estad&iacute;sticas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <i class="fas fa-chart-line" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/stats/list"> Listar Estad&iacute;sticas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="far fa fa-cogs" aria-hidden="true" style="color:#999999"></i><a target="_blank" href="https://ters.ar.ivao.aero"> TERS</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <i class="fa fa-search" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/members/search"> Buscar Miembro</a>
                                    </td>
                                </tr>
 								<tr>
                                    <td>
                                        <i class="fa fa-check-circle" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/members/validate"> Validar cuenta</a>
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                        <i class="fa fa-list" aria-hidden="true" style="color:#999999"></i><a onClick="mostrarAJAX('Miembros/AwardList.php', '.tooltip-demo')" href="#"> Gerenciar Medallas</a>
                                    </td>
                                </tr>
                               <tr>
                                    <td>
                                        <i class="far fa-comment" aria-hidden="true" style="color:#999999"></i><a onClick="mostrarAJAX('Miembros/AddNote.php', '.tooltip-demo')" href="#"> Nota</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } if($ShowTRAINING != 0 || $isADM){ ?>
                <div class="card bg-light">
                    <div class="card-header py-0">
                        <h4 class="card-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Entrenamiento</a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="collapse">
                        <div class="card-body py-0">
                            <table class="table">
							<?php if($ShowTRAINING == 1 || $isADM){ ?>
                                <tr>
                                    <td>
                                        <i class="far fa-address-card" style="color:#a94442" aria-hidden="true"></i><a style="color:#a94442" href="/intraweb/training/gca"> GCA</a>
                                    </td>
                                </tr>
								<!-- <tr>
                                    <td>
                                        <i class="far fa-chart-bar" aria-hidden="true" style="color:#a94442"></i><a style="color:#a94442" href="/intraweb/training/stats"> Estad&iacute;sticas</a>
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                        <i class="fa fa-list-alt" aria-hidden="true" style="color:#a94442"></i><a style="color:#a94442" href="/intraweb/training/requested"> Gestionar Entrenamientos</a>
                                    </td>
                                </tr> -->

							<?php } ?>
								<tr>
                                    <td>
                                        <i class="far fa-calendar-check" style="color:#999999"></i><a href="/intraweb/training/points/add"> Agregar Asistencia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="far fa-calendar-check" style="color:#999999"></i><a href="/intraweb/training/points/search"> Consultar puntos</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="far fa-clock" style="color:#999999"></i><a href="/intraweb/training/schedule"> Programar Training</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       <i class="far fa-clock" style="color:#999999"></i><a href="/intraweb/exam/schedule"> Programar Examen</a>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <i class="fa fa-list" style="color:#999999" aria-hidden="true"></i><a href="/intraweb/training/completed"> Listar Entrenamientos</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <i class="fa fa-inbox" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/training/my"> Mis Entrenamientos</a>
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                        <i class="fa fa-list" style="color:#999999" aria-hidden="true"></i><a href="/intraweb/training/exam/list"> Listar Ex&aacute;menes</a>
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                       <i class="fa fa-upload" style="color:#999999"></i><a href="/intraweb/exam/exam/add"> Calificar Examen</a>
                                    </td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
                </div>
				<?php } if($ShowPRD || $ShowEVENT || $isADM){ ?>
                <div class="card bg-light">
                    <div class="card-header py-0">
                        <h4 class="card-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><i class="far fa-newspaper" aria-hidden="true"></i> R. Públicas</a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="collapse">
                        <div class="card-body py-0">
                            <table class="table">
							<?php if($isADM){?>
                                <!-- <tr>
                                    <td>
                                        <i class="fas fa-pie-chart" aria-hidden="true" style="color:#999999"></i><a onClick="mostrarAJAX('PubRel/PrActShow.php', '.tooltip-demo')" href="#"> Mostrar Registros</a>
                                    </td>
                                </tr>
							<?php } ?>
                                <tr>
                                    <td>
                                        <i class="fa fa-upload" aria-hidden="true" style="color:#999999"></i><a onClick="mostrarAJAX('PubRel/PrAct.php', '.tooltip-demo')" href="#"> Registrar Actividad</a>
                                    </td>
                                </tr>  -->
                                <tr>
                                    <td>
                                        <i class="fa fa-upload" aria-hidden="true" style="color:#999999"></i><a href="/intraweb/events/addBanner"> Subir Banner</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            
<script>
window.setTimeout(function(){
	
	$('#new').fadeOut(1000);
	$('#new').fadeIn(1000);
	
	setTimeout()
	
}(), 1000)
</script>
