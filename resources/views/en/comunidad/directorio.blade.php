@extends('template')

@section('titulo')
<title>Directory :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
			<div class="container marketing">
 <!-- DOS COLUMNAS -->
  
  			<div class="tooltip-web">
    <div id="usuarios" class="tabla-novedades">

		<table class="table table-hover table-striped">
			<colgroup>
                <col style="width:6%">
				<col style="width:6%">
				<col style="width:8%">
                <col style="width:50%">
                <col style="width:15%">
                <col style="width:15%">
           	</colgroup>
			<thead class="thead-dark">
                <tr class="bg-primary2">
                  <td></td>
                  <td></td>
				  <td>VID</td>
                  <td>Name</td>
                  <td>Pilot</td>
                  <td>ATC</td>
                </tr>
            </thead>
            <tbody>
            @if(Auth::check())
                @foreach($registros as $registro)
                    @php

                    $permiso = '';
                    foreach($staffs as $staff)
                        if($registro->vid == $staff->vid) $permiso = $staff->permissions;
                                                
                    @endphp
					
					<tr>
						<td>
                        @if($permiso == 'ADM')
                            <div class="status_dcty status_2 cursor" data-toggle="tooltip" data-placement="right" title="Administrador"> <div class="status_txt status_adm">ADM</div><div class="status_border_info"></div></div>
                        @elseif($registro->ivao_rating == 0)
                            <div class="status_dcty status_4 cursor" data-toggle="tooltip" data-placement="right" title="Usuario Suspendido"> <center><i style="font-size: 29px;opacity: 0.3;z-index: 300;position: relative;" class="fa fa-ban text-danger"></i></center>  <div class="status_txt status_suspended">SUSP</div><div class="status_border_danger"></div></div>
                        @elseif($registro->ivao_rating == 1)
                            <div data-original-title="Usuario Inactivo" class="status_dcty status_5 cursor" data-toggle="tooltip" data-placement="right" title=""> <div class="status_txt status_inactive">INACT</div><div class="status_border_warning"></div></div>
                        @elseif($registro->ivao_rating == 3)
                            <div data-original-title="En Memoria" class="status_dcty status_6 cursor" data-toggle="tooltip" data-placement="right" title="">  <div class="status_border_inmemoriam"></div></div>
                        @elseif($registro->ivao_rating == 11)
                            <div data-original-title="IVAO Supervisor" class="status_dcty status_1 cursor" data-toggle="tooltip" data-placement="right" title=""> <div class="status_txt status_sup">SUP</div><div class="status_border_success"></div></div>
                        @elseif($registro->ivao_rating == 12)
                            <div data-original-title="IVAO Administrator" class="status_dcty status_1 cursor" data-toggle="tooltip" data-placement="right" title=""> <div class="status_txt status_sup">ADM</div><div class="status_border_success"></div></div>
                        @else
                            <div data-original-title="Usuario" class="status_dcty status_3 cursor" data-toggle="tooltip" data-placement="right" title="">  <div class="status_border_success_user"></div></div>
                        @endif
                        </td>
                        
						<td><img class="w-75 h-auto image-directory" src="/img/user/{{$registro->vid}}.jpg" /></td>
                        <td style="vertical-align: middle;"><a href="https://ivao.com.ar/index.php?pagina=login/perfil&vid={{$registro->vid}}">{{$registro->vid}}</a></td>
                        <td style="vertical-align: middle;">{{$registro->name}} {{$registro->surname}}</td>
                        <td><img src="https://www.ivao.aero/data/images/ratings/pilot/{{$registro->pilot_rating}}.gif" data-toggle="tooltip" data-placement="bottom" title="Pilot" /></td>
                        <td><img src="https://www.ivao.aero/data/images/ratings/atc/{{$registro->atc_rating}}.gif" data-toggle="tooltip" data-placement="bottom" title="ATC" /></td>
                        </tr>

                @endforeach
            @else
                  <script>window.location = "/error/401";</script>
            @endif

                        </tbody>
					</table>
            
               
<center>        
{{ $registros->links() }}
</center>
    </div><!-- /.tabla-novedades -->
    	</div><!-- /.tooltip-web -->

        <script>
    // tooltip demo
    $('.tooltip-web').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>
</section>
@endsection