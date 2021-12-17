$.datetimepicker.setLocale('es');
var horas = ['00:30', '01:00', '01:30', '02:00', '02:30', '03:00'];
$('#duracion').datetimepicker({allowTimes: horas, datepicker: false, step: 30, format: 'H:i'});