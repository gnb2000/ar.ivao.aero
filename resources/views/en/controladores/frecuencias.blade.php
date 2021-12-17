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
              <div class="tabla-novedades">
              
                
        <div class="tabs">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="#cordoba" data-bs-toggle="tab">FIR C&oacute;rdoba</a></li>
                <li class="nav-item"><a class="nav-link" href="#ezeiza" data-bs-toggle="tab">FIR Ezeiza</a></li>
                <li class="nav-item"><a class="nav-link" href="#mendoza" data-bs-toggle="tab">FIR Mendoza</a></li>
                <li class="nav-item"><a class="nav-link" href="#resistencia" data-bs-toggle="tab">FIR Resistencia</a></li>
                <li class="nav-item"><a class="nav-link" href="#comodoro" data-bs-toggle="tab">FIR Comodoro</a></li>
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="cordoba">
                
                <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Cordoba</h2>
                    <div class="separacion-tablas"></div>
    
            <table class="table table-striped">
                  <thead class="thead-dark">
                        <tr class="thead-dark">
                          <th></th>
                          <th>Posici&oacute;n</th>
                          <th>Nombre</th>
                          <th>FIR</th>
                          <th>Frecuencia</th>
                        </tr>
                  </thead>
               <tbody>
            @foreach($SACF as $freq)
                      <tr>
                        <td><img alt="sector" src="/img/check-responsive.png"></td>
                        <td>{{$freq->PosId}}</td>
                        <td>{{$freq->PosName}}</td>
                        <td>{{$freq->FIR}}</td>
                        <td>{{$freq->Freq}}</td>
                      </tr>
            @endforeach
                 </tbody>
             </table>
                
                </div><!-- /.tabpanel -->
                <div class="tab-pane" id="ezeiza">
                
                <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Ezeiza</h2>
    <div class="separacion-tablas"></div>
    
            <table class="table table-striped">

                  <thead class="thead-dark">
                        <tr class="thead-dark">
                          <th></th>
                          <th>Posici&oacute;n</th>
                          <th>Nombre</th>
                          <th>FIR</th>
                          <th>Frecuencia</th>
                        </tr>
                  </thead>
               <tbody>
            @foreach($SAEF as $freq)
                      <tr>
                        <td><img alt="sector" src="/img/check-responsive.png"></td>
                        <td>{{$freq->PosId}}</td>
                        <td>{{$freq->PosName}}</td>
                        <td>{{$freq->FIR}}</td>
                        <td>{{$freq->Freq}}</td>
                      </tr>
            @endforeach
                 </tbody>
             </table>
                         
                </div><!-- /.tabpanel -->
                <div class="tab-pane" id="mendoza">
                
                <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Mendoza</h2>
    <div class="separacion-tablas"></div>
    
            <table class="table table-striped">

                  <thead class="thead-dark">
                        <tr class="thead-dark">
                          <th></th>
                          <th>Posici&oacute;n</th>
                          <th>Nombre</th>
                          <th>FIR</th>
                          <th>Frecuencia</th>
                        </tr>
                  </thead>

               <tbody>
            @foreach($SAMF as $freq)
                      <tr>
                        <td><img alt="sector" src="/img/check-responsive.png"></td>
                        <td>{{$freq->PosId}}</td>
                        <td>{{$freq->PosName}}</td>
                        <td>{{$freq->FIR}}</td>
                        <td>{{$freq->Freq}}</td>
                      </tr>
            @endforeach
                 </tbody>
             </table>
                
                </div><!-- /.tabpanel -->
                <div class="tab-pane" id="resistencia">
                
                <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Resistencia</h2>
    <div class="separacion-tablas"></div>
    
            <table class="table table-striped">

                  <thead class="thead-dark">
                        <tr class="thead-dark">
                          <th></th>
                          <th>Posici&oacute;n</th>
                          <th>Nombre</th>
                          <th>FIR</th>
                          <th>Frecuencia</th>
                        </tr>
                  </thead>

               <tbody>
            @foreach($SARR as $freq)
                      <tr>
                        <td><img alt="sector" src="/img/check-responsive.png"></td>
                        <td>{{$freq->PosId}}</td>
                        <td>{{$freq->PosName}}</td>
                        <td>{{$freq->FIR}}</td>
                        <td>{{$freq->Freq}}</td>
                      </tr>
            @endforeach
                 </tbody>
             </table>
                
                </div><!-- /.tabpanel -->
                
                
                  <div class="tab-pane" id="comodoro">
            
                <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Comodoro Rivadavia</h2>
    <div class="separacion-tablas"></div>
    
            <table class="table table-striped">

                  <thead class="thead-dark">
                        <tr class="thead-dark">
                          <th></th>
                          <th>Posici&oacute;n</th>
                          <th>Nombre</th>
                          <th>FIR</th>
                          <th>Frecuencia</th>
                        </tr>
                  </thead>

               <tbody>
            @foreach($SAVF as $freq)
                      <tr>
                        <td><img alt="sector" src="/img/check-responsive.png"></td>
                        <td>{{$freq->PosId}}</td>
                        <td>{{$freq->PosName}}</td>
                        <td>{{$freq->FIR}}</td>
                        <td>{{$freq->Freq}}</td>
                      </tr>
            @endforeach
                 </tbody>
             </table>
                
            </div><!-- /.tabpanel -->                
                       
                </div>
              </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
            
      </div><!-- /.tabla-novedades -->
               
</section>
@endsection