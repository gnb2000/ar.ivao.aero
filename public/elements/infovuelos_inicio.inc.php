<?php 
require_once 'elements/infovuelos.inc.php'; 
require_once 'conexion.php'; ?>

                            
                            <table class="table table-hover">
        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td><span data-toggle="tooltip" data-placement="bottom" title="Estimated Time Of Departure">ETOD</span></td>
                                  <td>Callsign</td>
                                  <td></td>
                                  <td>Origen</td>
                                  <td>Destino</td>
                                </tr>
                             </thead>
			
                             	<tbody>
                             	<?php
								if (count($pilots) != 0)
								{
									foreach($pilots as $pilot)
									{
										$sqls = "SELECT * FROM aeropuertos WHERE icao = '$pilot[11]'";
										$sqlll = "SELECT * FROM aeropuertos WHERE icao = '$pilot[13]'";
										$rsalida = mysqli_query($con, $sqls);
										$rllegada = mysqli_query($con, $sqlll);
										$filas = mysqli_fetch_array($rsalida);
										$filall = mysqli_fetch_array($rllegada);
										$paiss = $filas['pais'];
										$paisll = $filall['pais'];
										$nombres = $filas['nombre'];
										$nombrell = $filall['nombre'];
										$ciudads = $filas['ciudad'];
										$ciudadll = $filall['ciudad'];
										$imgs = "<img alt=\"vuelos\" src=\"http://www.ivao.com.ar/portal/images/flags/16/$paiss.png\" />";
										$imgll = "<img alt=\"vuelos\" src=\"http://www.ivao.com.ar/portal/images/flags/16/$paisll.png\" />";
										if(strlen($pilot[22]) == 1) $pilot[22] = str_pad($pilot[22], 4, '0', STR_PAD_LEFT);
										if(strlen($pilot[22]) == 2) $pilot[22] = str_pad($pilot[22], 4, '0', STR_PAD_LEFT);
										if(strlen($pilot[22]) == 3) $pilot[22] = str_pad($pilot[22], 4, '0', STR_PAD_LEFT);
										if(strlen($pilot[26]) == 1) $pilot[26] = str_pad($pilot[26], 2, '0', STR_PAD_LEFT);
										if(strlen($pilot[27]) == 1) $pilot[27] = str_pad($pilot[27], 2, '0', STR_PAD_LEFT);
										if($pilot[46] == 1) $pilot[46] = 'Rodando'; else $pilot[46] = 'En Ruta';
										
										if($paiss == 'Argentina')
										{
											echo '<tr>
											  <td>' .substr($pilot[22],0,2).':'.substr($pilot[22],2,2).'</td>
											  <td><a href="recursos/infovuelos/estado.php?cs='.$pilot[0].'">' .$pilot[0]. '</a></td>
											  <td><img alt="aerolinea" src="recursos/online/images/airlines/'.substr($pilot[0],0,3).'.gif" /></td>
											  <td>'.$imgs.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudads.'">' .$pilot[11]. '</strong></td>
											  <td>'.$imgll.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudadll.'">' .$pilot[13]. '</strong></td>
											</tr>';
										}
									 } 
								}
							  ?>
                              </tbody>
                              </table>