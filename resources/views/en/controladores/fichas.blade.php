@extends('template')

@section('titulo')
<title>Fichas ATC :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
      <div class="container marketing">
 <!-- DOS COLUMNAS -->
    
    <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          
              <div class="tabla-novedades">
                  

                  <table class='table table-striped'>
                    <thead class="thead-dark">
                          <tr class='thead-dark'>
                            <th>ICAO</th>
                            <th>Aeropuerto</th>
                            <th>FIR</th>
                            <th>Versi&oacute;n</th>
                            <th></th>
                          </tr>
                    </thead>

                    <tbody>
                    @foreach($sheets as $sheet)
                    <tr>
                      <td>{{$sheet->icao}}</td>
                      <td>{{$sheet->city}} - {{$sheet->name}}</td>
                      <td>{{$sheet->fir}}</td>
                      <td>{{$sheet->version}}</td>
                      <td><a href='http://files.ar.ivao.aero/ATC/Fichas/{{$sheet->icao}}_v{{$sheet->version}}.pdf' target='_blank'><i class='fas fa-cloud-download-alt'></i></a></td>
                    </tr>
                  @endforeach

                  </tbody>
                  </table>
            
              </div><!-- /.tabla-novedades -->
                
          </div><!-- /.col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 -->
   </div><!-- /.row -->
</section>
@endsection