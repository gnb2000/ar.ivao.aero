@extends('template')

@section('titulo')
<title>Calendario :: IVAO Argentina</title>
@endsection

@section('headextra')
<!-- fullCalendar 5.4 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/locales-all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>

<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #script-warning {
    display: none;
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    text-align: center;
    font-weight: bold;
    font-size: 12px;
    color: red;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }
</style>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
	<div class="container marketing">
 <!-- DOS COLUMNAS -->
  
    <div class="tabla-novedades">
    
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      editable: true,
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many events
      events: {
        url: '/assets/calendar/php/get-events.php',
        failure: function() {
          document.getElementById('script-warning').style.display = 'block'
        }
      },
      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }
    });

    calendar.render();
  });

</script>

  <div id='script-warning'>
    <code>php/get-events.php</code> must be running.
  </div>

  <div id='loading'>loading...</div>

  <div id='calendar'></div>
  <div class="text-center">
    <br />
    <span class="fs-5 text-white badge badge-success">Entrenamiento</span>
    <span class="fs-5 text-white badge badge-primary">Examen</span>
    <?php if(Cookie::has('isStaff')) echo '<span class="fs-5 text-white badge badge-danger">Reuni&oacute;n Staff</span>'; ?>
    <span class="fs-5 text-white badge badge-warning">Evento</span>
  </div>

    </div><!-- /.tabla-novedades -->
</section>
@endsection