<script language="javascript">
	
setTimeout(function(){
   window.location.reload(1);
}, 60000);
	
</script>


@extends('template')

@section('titulo')
<title>Infovuelos :: IVAO Argentina</title>
@endsection

@section('contenido')     
@php
require($_SERVER['DOCUMENT_ROOT'].'/elements/infovuelos.inc.php');
date_default_timezone_set('UTC');
use App\Airport;
@endphp

<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
			<div class="container marketing">

  <div class="tooltip-web">
    <?php
$dataLocal = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/datafeed/whazzup.txt');
$dataRecords = explode("\n", $dataLocal);
$dataError = 'Error al obtener la información';
  foreach ($dataRecords as $dataRecord) {
    $dataField = explode(":", $dataRecord);
      if ($dataField[0] == $cs) {
        $dataName = explode(' ',$dataField[2]);
        $dataAC = substr($dataField[9],2,4);
        $dataStatus = $dataField[46] == 1 ? "On Ground" : "Airborne";
        $dataDep = $dataField[11];
        $dataArr = $dataField[13];
        $dataField[26] = strlen($dataField[26]) == 1 ? str_pad($dataField[26], 2, '0', STR_PAD_LEFT) : $dataField[26];
        $dataField[27] = strlen($dataField[27]) == 1 ? str_pad($dataField[27], 2, '0', STR_PAD_LEFT) : $dataField[27];
          $fob = $dataField[26].':'.$dataField[27];
        $dataField[24] = strlen($dataField[24]) == 1 ? str_pad($dataField[24], 2, '0', STR_PAD_LEFT) : $dataField[24];
        $dataField[25] = strlen($dataField[25]) == 1 ? str_pad($dataField[25], 2, '0', STR_PAD_LEFT) : $dataField[25];
        $eet = $dataField[24].':'.$dataField[25];
        
        if(strlen($dataField[22]) == 3) $dataField[22] = str_pad($dataField[22], 4, '0', STR_PAD_LEFT);
        if(strlen($dataField[22]) == 2) $dataField[22] = str_pad($dataField[22], 4, '0', STR_PAD_LEFT);
        if(strlen($dataField[22]) == 1) $dataField[22] = str_pad($dataField[22], 4, '0', STR_PAD_LEFT);
        
            $aeropuertoSalida = Airport::where('icao', $dataField[11])->first();
            $aeropuertoLlegada = Airport::where('icao', $dataField[13])->first();
            $paisSalida = @$aeropuertoSalida->country;
            $paisLlegada = @$aeropuertoLlegada->country;
            $nombreSalida = @$aeropuertoSalida->name;
            $nombreLlegada = @$aeropuertoLlegada->name;
            $ciudadSalida = utf8_encode(@$aeropuertoSalida->city);
            $ciudadLlegada = utf8_encode(@$aeropuertoLlegada->city);
            $imgSalida = '/img/flags/48/'.$paisSalida.'.png';
            $imgLlegada = '/img/flags/48/'.$paisLlegada.'.png';
        ?>
    
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->

      <div class="container marketing">

<h2>Estado del vuelo: <small>{{$cs}}</small></h2><br>

              <div class="card panel-ivao">
                        <div class="card-header">
                            <strong style="font-size: 26px;"><i class="fa fa-plane fa-fw"></i> <?php echo $dataField[0]; ?> <span class="pull-right">(<?php echo $dataAC; ?>)</span></strong>
                        </div><!-- /.panel-heading -->
                        <div class="card-body">
                            
                            
                            <div class="row">
                              <div class="col-md-12 bg-success text-success" style="text-align: center; padding: 10px; font-size: 18px;">
                             
                                <i class="fa fa-plane"></i> <strong><?php echo $dataStatus; ?></strong>
                              
                              </div><!-- /.COL-MD-12 -->
                            </div><!-- /.row -->
                            
                            <div class="row">
                              <div class="col-md-6" style="border-right: 1px solid rgb(217, 237, 247);">
                              
                                  <img data-toggle="tooltip" data-placement="bottom" title="<?php echo $paisSalida; ?>" src="<?php echo $imgSalida; ?>" alt="AR" style="margin-top: -15px;margin-right: 10px;" /> 
                                    <span style="font-size: 3.10em;" data-toggle="tooltip" data-placement="right" title="<?php echo $nombreSalida; ?>"><strong><?php echo $dataDep; ?></strong></span> 
                                    
                                    <h2> <?php echo $ciudadSalida; ?></h2>

                                    <div class="row">
                                      <div class="col-md-12 bg-info text-info" style="margin-top: 15px; margin-bottom: 15px;">
                                        
                                          <img src="/img/infovuelos/dep.png" style="border-radius: 5%; padding-top: 8px;
padding-bottom: 8px; padding-right: 15px;" width="42"> 

<strong style="letter-spacing: 2px;text-transform: uppercase;">Salida</strong> 

                                        
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                    
                                    <div class="row">
                                      <div class="col-md-6">
                                      
                                          <span style="margin-bottom: 10px; font-size: 14px; color: #999;" data-toggle="tooltip" data-placement="right" title="Estimated Off-Block Time">EOBT:</span><br>
                                            
                                            <span style="font-size: 1.8em !important; color: #999;">
                                            <?php
                                            $dep = $dataField[22];
                                            echo $dep[0].$dep[1].':'.$dep[2].$dep[3];
                                            ?>
                                            h </span>
                                            
                                      
                                      </div><!-- /.col-md-6 -->
                                      <div class="col-md-6">
                                      
                                          <span style="margin-bottom: 10px; font-size: 14px; color: #999;" data-toggle="tooltip" data-placement="right" title="Estimated Time of Departure">ETOD:</span><br>
                                            
                                            <span style="font-size: 1.8em !important; color: #3C763D; font-weight: 700;">
                                            <?php
                                            $dep = $dataField[22];
                                            
                                            $fechaActual = mktime(date('H'));
                                            $timetod = mktime(substr($dep,0,2), substr($dep,2,2)) + 600;
                                            $horaActual = date('H', $fechaActual);
                                            $difdia = (int)$horaActual - (int)(substr($dep,0,2));
                                            if($difdia < -1) $timetod = mktime(substr($dep,0,2), substr($dep,2,2), date('s'), date('n'), (int)date('j') - 1);
                      
                                            echo date('H:i', $timetod);
                                            ?>
                                            h
                                            </span>
                                      
                                      </div><!-- /.col-md-6 -->
                                    </div><!-- /.row -->
                                    
                                    
                              
                              </div><!-- /.col-md-6 -->
                              <div class="col-md-6">
                              
                                  <img data-toggle="tooltip" data-placement="bottom" title="<?php echo $paisLlegada; ?>" src="<?php echo $imgLlegada; ?>" alt="AR" style="margin-top: -15px; margin-right: 10px;" /> 
                                    <span style="font-size: 3.10em;" data-toggle="tooltip" data-placement="right" title="<?php echo $nombreLlegada; ?>"><strong><?php echo $dataArr; ?></strong></span><br>
                                    <h2><?php echo $ciudadLlegada; ?></h2>
                                    
                                    <div class="row">
                                      <div class="col-md-12 bg-info text-info" style="margin-top: 15px; margin-bottom: 15px;">
                                        
                                          <img src="/img/infovuelos/arr.png" style="border-radius: 5%; padding-top: 8px;
padding-bottom: 8px; padding-right: 15px;" width="42"> <strong style="letter-spacing: 2px;text-transform: uppercase;">Llegada</strong>
                                        
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                    
                                    <div class="row">
                                      <div class="col-md-6">
                                      
                                          <span style="margin-bottom: 10px; font-size: 14px; color: #999;" data-toggle="tooltip" data-placement="right" title="Scheduled Time of Arrival">STA:</span><br>
                                            
                                            <span style="font-size: 1.8em !important; color: #999;">
                                            <?php
                                            $ete = $dataField[24]*3600 + $dataField[25]*60;
                                            
                                            $dep = $dataField[22];
                                            
                                            $fechaActual = mktime(date('H'));
                                            $timetod = mktime(substr($dep,0,2), substr($dep,2,2)) + 600;
                                            $horaActual = date('H', $fechaActual);
                                            $difdia = (int)$horaActual - (int)(substr($dep,0,2));
                                            if($difdia < -1) $timetod = mktime(substr($dep,0,2), substr($dep,2,2), date('s'), date('n'), (int)date('j') - 1);
                                            
                                                                  echo date('H:i', $timetod + $ete);
                                            ?>
                                            h
                                            </span>
                                      
                                      </div><!-- /.col-md-6 -->
                                      <div class="col-md-6">
                                      
                                          <span style="margin-bottom: 10px; font-size: 14px; color: #999;" data-toggle="tooltip" data-placement="right" title="Estimated Time of Arrival">ETA:</span><br>
                                            
                                            <span style="font-size: 1.8em !important; color: #3C763D; font-weight: 700;">
                                            <?php
                                            $ete = $dataField[24]*3600 + $dataField[25]*60;
                                            
                                            $dep = $dataField[22];
                                            
                                            $fechaActual = mktime(date('H'));
                                            $timetod = mktime(substr($dep,0,2), substr($dep,2,2)) + 600;
                                            $horaActual = date('H', $fechaActual);
                                            $difdia = (int)$horaActual - (int)(substr($dep,0,2));
                                            if($difdia < -1) $timetod = mktime(substr($dep,0,2), substr($dep,2,2), date('s'), date('n'), (int)date('j') - 1);
                                            
                                            $eta = $timetod + $ete;
                                            if(($eta - $fechaActual) < 0) $eta = $fechaActual + 300;

                                                                  echo date('H:i', $eta);
                                            ?>
                                            h
                                            </span>
                                      
                                      </div><!-- /.col-md-6 -->
                                    </div><!-- /.row -->
                              
                              </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            
                            <hr style="margin-bottom: 20px;">
                            
                            <span style="margin-bottom: 10px; font-size: 14px; color: #999;" data-toggle="tooltip" data-placement="right" title="Ruta de Vuelo">Ruta:</span><br>
                            <span style="font-family:Courier New, Courier, monospace;">
                            <?php echo $dataField[30]; ?>
                            </span>
                            <br>
                            
                            <span style="margin-bottom: 10px; font-size: 14px; color: #999;" data-toggle="tooltip" data-placement="right" title="Remarks/Observaciones del FPL">Remarks:</span><br>
                            <span style="font-family:Courier New, Courier, monospace;">
                            <?php echo $dataField[29]; ?>
                            </span>
                            <br><br>
                            
                        </div><!-- /.panel-body -->
                        <div class="card-footer">
                                
                                    <div class="row">
                                      <div class="col-md-2">
                                      
                                        <h2><small></small><br>
                                        <img alt="BLANK" src="<?php echo '/img/infovuelos/airlines/'.substr($cs,0,3).'.gif'; ?>" />
                                      
                                      </div><!-- /.col-md-2 -->
                                      <div class="col-md-2">
                                      
                    <h2><small>AVIÓN:</small><br></h2>        
                                        
                                        <strong><?php echo $dataAC; ?></strong>                              
                                      
                                      </div><!-- /.col-md-2 -->
                                      <div class="col-md-2">
                                      
                                        <h2><small>Total EET:</small><br></h2>        
                                        
                                        <strong><?php echo $eet; ?></strong>  
                                      
                                      </div><!-- /.col-md-2 -->
                                      <div class="col-md-2">
                                      
                                        <h2><small>FOB:</small><br></h2>        
                                        
                                        <strong><?php echo $fob; ?></strong>  
                                      
                                      </div><!-- /.col-md-2 -->
                                      <div class="col-md-2">
                                      
                                        <h2><small>Online Time:</small><br></h2>        
                                        
                                        <strong>
                                        <?php
                                        $conexion = $dataField[37];
                                        $anyo = substr($conexion, 0, 4);
                                        $mes = substr($conexion, 4, 2);
                                        $dia = substr($conexion, 6, 2);
                                        $hora = substr($conexion, 8, 2);
                                        $mins = substr($conexion, 10, 2);

                                        $fechaConexion = mktime($hora, $mins, 0, $mes, $dia, $anyo);
                                        $fechaActual = mktime(gmdate('H'));
                                        
                                        $dif = $fechaActual - $fechaConexion;
                                        echo gmdate('H:i', $dif);
                                        ?>
                                        </strong>   
                                      
                                      </div><!-- /.col-md-2 -->
                                      <div class="col-md-2">
                                      
                                        <h2><small>PIC:</small><br></h2>        
                                        
                                        <a href="<?php echo 'https://www.ivao.aero/Member.aspx?Id='.$dataField[1]; ?>" target=""><strong><?php echo $dataField[2]; ?></strong></a>    
                                      
                                      </div><!-- /.col-md-2 -->
                                    </div><!-- /.row -->
                        </div>
                    </div>
                    
<?php
        }
  }
?>

      </div><!-- /.tooltip -->   
  		
</div><!-- /.container marketing -->

	<!-- script references -->
        
<script>
$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});
</script>
</section>
@endsection