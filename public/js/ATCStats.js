$.datetimepicker.setLocale('es');
$.datetimepicker.setDateFormatter('moment');
$('#fechainicio').datetimepicker({timepicker: false, format: 'YYYY-MM-DD', minDate: '2017-01-01 00:00:00'});
$('#fechafin').datetimepicker({timepicker: false, format: 'YYYY-MM-DD', minDate: '2017-01-01 00:00:00'});