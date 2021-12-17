/* var cuentaLunes = 1, cuentaMartes = 1, cuentaMiercoles = 1, cuentaJueves = 1, cuentaViernes = 1, cuentaSabado = 1, cuentaDomingo = 1;
function agregarCampos(dia)
{
	var columnaInicio = $('#' + dia + ' .col-md-4').first();
	var columnaFin = $('#' + dia + ' .col-md-4').last();
		
	var inputInicio, inputFin;
	switch(dia)
	{
		case 'lunes': 
		{
			inputInicio = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="lunes[' + cuentaLunes + '][0]" type="text" />');
			inputFin = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="lunes[' + cuentaLunes + '][1]" type="text" />');
			cuentaLunes++;
			break;
		}
		case 'martes': 
		{
			inputInicio = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="martes[' + cuentaMartes + '][0]" type="text" />');
			inputFin = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="martes[' + cuentaMartes + '][1]" type="text" />');
			cuentaMartes++;
			break;
		}
		case 'miercoles': 
		{
			inputInicio = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="miercoles[' + cuentaMiercoles + '][0]" type="text" />');
			inputFin = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="miercoles[' + cuentaMiercoles + '][1]" type="text" />');
			cuentaMiercoles++;
			break;
		}
		case 'jueves': 
		{
			inputInicio = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="jueves[' + cuentaJueves + '][0]" type="text" />');
			inputFin = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="jueves[' + cuentaJueves + '][1]" type="text" />');
			cuentaJueves++;
			break;
		}
		case 'viernes': 
		{
			inputInicio = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="viernes[' + cuentaViernes + '][0]" type="text" />');
			inputFin = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="viernes[' + cuentaViernes + '][1]" type="text" />');
			cuentaViernes++;
			break;
		}
		case 'sabado': 
		{
			inputInicio = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="sabado[' + cuentaSabado + '][0]" type="text" />');
			inputFin = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="sabado[' + cuentaSabado + '][1]" type="text" />');
			cuentaSabado++;
			break;
		}
		case 'domingo': 
		{
			inputInicio = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="domingo[' + cuentaDomingo + '][0]" type="text" />');
			inputFin = $('<hr style="margin-top: 7px !important;margin-bottom: 7px !important;" /> <input class="form-control input-md" name="domingo[' + cuentaDomingo + '][1]" type="text" />');
			cuentaDomingo++;
			break;
		}
	}
	
	columnaInicio.append(inputInicio);
	columnaFin.append(inputFin);
	
	$('.form-control').datetimepicker({ step: 30, datepicker: false, format: 'H:i' });
}
function eliminarUltimosCampos(dia)
{
	var inputInicio = $('#' + dia + 'inicio input');
	var hrInicio = $('#' + dia + 'inicio hr');
	var inputFin = $('#' + dia + 'fin input');
	var hrFin = $('#' + dia + 'fin hr');
	
	inputInicio.last().remove();
	inputFin.last().remove();
	hrFin.last().remove();
	hrInicio.last().remove();
	
	switch(dia)
	{
		case 'lunes': cuentaLunes--; break;
		case 'martes': cuentaMartes--; break;
		case 'miercoles': cuentaMiercoles--; break;
		case 'jueves': cuentaJueves--; break;
		case 'viernes': cuentaViernes--; break;
		case 'sabado': cuentaSabado--; break;
		case 'domingo': cuentaDomingo--; break;
	}
} */

function StaffChange()
{
	window.location = '/intraweb/staff/' + $('#vid').val() + '/changes';
	//var valor = $('#vid').val();
	//mostrarAJAX('HQ/ActionList.php?fv=' + valor, '.tooltip-demo')
}
function DepChange()
{
	window.location = '/intraweb/staff/' + $('#dep').val() + '/changes';
	//var valor = $('#dep').val();
	//mostrarAJAX('HQ/ActionList.php?fd=' + valor, '.tooltip-demo')
}
function enviarForm(enlace, elem)
{ 
	var formData = new FormData($('form')[0]);
	
	$.ajax
	({
		url: enlace,
		type: 'POST',
		data: formData,
		contentType: false,
		processData: false,
		cache: false,
		beforeSend: function() { $(elem).html('<br /><center style="margin-top: 50px;"><span style="margin-right:8px;"></span><img src="../../images/loading.gif" /><div style="font-size: 20px;margin-top: 25px;">Loading...</div></center>'); },
		error: function(xhr) { $(elem).html(xhr.status + ' ' + xhr.statusText); },
		success: function(result) { $(elem).html(result); }
	});
} 
function mostrarAJAX(enlace, elem)
{
	$.ajax
	({
		url: enlace,
		cache: false,
		beforeSend: function() { $(elem).html('<br /><center style="margin-top: 50px;"><span style="margin-right:8px;"></span><img src="../images/loading.gif" /><div style="font-size: 20px;margin-top: 25px;">Loading...</div></center>'); },
		error: function(xhr) { $(elem).html(xhr.status + ' ' + xhr.statusText); },
		success: function(result){ $(elem).html(result); }
	});
}
function cambioExamen(elem)
{
	var id = $(elem).val();
	var atcs = $('#selATCs');
	var pilots = $('#selPilots');
		
	$.ajax
	({
		url: '/intranet/Entrenamiento/GetExamATCs.php',
		type: 'POST',
		data: {id: id},
		error: function(xhr) { atcs.html('Error: ' + xhr.status + ' ' + xhr.responseText); },
		success: function(result) {	atcs.html(result); }
	});
	
	$.ajax
	({
		url: '/intranet/Entrenamiento/GetExamPilots.php',
		type: 'POST',
		data: {id: id},
		error: function(xhr) { pilots.html('Error: ' + xhr.status + ' ' + xhr.responseText); },
		success: function(result) {	pilots.html(result); }
	});
}
function DateChange(elem = null)
{
	var fecha = elem == null ? $('#fecha').val() : $(elem).val();
	var atcs = $('#selATCs');
	var pilots = $('#selPilots');
		
	$.ajax
	({
		url: '/intranet/Entrenamiento/GetDateATCs.php',
		type: 'POST',
		data: {date: fecha},
		error: function(xhr) { atcs.html('Error: ' + xhr.status + ' ' + xhr.responseText); },
		success: function(result) {	atcs.html(result); }
	});
	
	$.ajax
	({
		url: '/intranet/Entrenamiento/GetDatePilots.php',
		type: 'POST',
		data: {date: fecha},
		error: function(xhr) { pilots.html('Error: ' + xhr.status + ' ' + xhr.responseText); },
		success: function(result) {	pilots.html(result); }
	});
}
/* function cambioFecha(elem)
{
	var f = $(elem).val();
	var t = $('#training').val();
		
	$.ajax
	({
		url: 'obtener-horas.php?fecha=' + f + '&id=' + t,
		type: 'POST',
		dataType: 'json',
		contentType: 'application/json; charset=utf-8',
		error: function(xhr) { $(elem).val('Error: ' + xhr.status + ' ' + xhr.responseText); },
		success: function(result)
		{		
			if(result != '') $(elem).datetimepicker({allowTimes: result, format: 'Y-m-d H:i'});
			else
			{
				$(elem).datetimepicker({timepicker: false});
				$('#mensaje').css('display', 'inherit');
				
				setTimeout
				(
						function() { mostrarAJAX('solicitar-training.php?id=' + t, '.tooltip-demo'); }
				, 5000);
				
				
			}
		}
	});
} */