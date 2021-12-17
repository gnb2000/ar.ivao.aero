@extends('templateIntraweb')

@section('titulo')
<title>Registro :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/jquery.datetimepicker.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGINA -->
<section>

    <div style="text-align: center;" class="tabla-novedades">
      @include('flash::message')
    <form class="form-horizontal" action="{{action('Auth\LoginController@register')}}" method="post" role="form">
      @csrf
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <strong>Atención!</strong> Si desea acceder a la zona restringida de IVAO Argentina, deberá crear una cuenta rellenando el siguiente formulario.
        </div>
        <br />
          <div style="text-align: center; padding: 10px 0px 20px 0px; border-bottom: 1px solid rgba(0, 0, 0, 0.1);">

        <div class="separacion-tablas"></div>

            <input class="form-control input-md" type="hidden" name="vid" id="vid" value="{{$vid}}">

        <!-- /.col-md-12 -->
        <div class="col-md-12">
          <div class="form-group">
            <label>Fecha de Nacimiento</label>
           <!-- <select class="form-control" name="anyo" id="anyo">
                <option value="0">A&ntilde;o...</option>
                @for($i = (date('Y') - 10); $i < (date('Y') - 10); $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <select class="form-control" name="mes" id="mes">
                <option value="0">Mes...</option>
                @for($i = 1; $i < 13; $i++) 
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <select class="form-control" name="dia" id="dia">
                <option value="0">D&iacute;a...</option>
                @for($i = 1; $i < 32; $i++) 
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select> -->
            <input autocomplete="off" class="form-control input-md" type="text" name="birthday" id="birthday" placeholder="Fecha Nacimiento">

          </div>
          <!-- /.form-group -->
        </div>
        
        <div class="col-md-12">
          <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Atención!</strong> Caso no reciba el email de confirmación, por favor chequee en su carpeta de Spam o correo no deseado.
          </div>
        </div>
        <!-- /.col-md-12 -->
        <div class="col-md-12">
          <div class="form-group">
            <label>Email</label>
            <input required class="form-control input-md" type="text" name="email" id="inputEmail" placeholder="Email">
          </div>
          <!-- /.form-group -->
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Confirmar Email</label>
            <input required class="form-control input-md" type="text" name="email2" id="inputEmail2" placeholder="Email">
          </div>
          <!-- /.form-group -->
        </div>

        <div class="form-group">
          <div class="col-md-2">
          </div>
          <!-- /.col-md-2 -->
          <div class="col-md-10">
            <div class="checkbox">
              <input required id="checkbox1" type="checkbox" value="agree" name="tos">
              <label for="checkbox1">Acepto las <a href="https://doc.ivao.aero//rules:network" target="_blank">Rules & Regulations</a>, la <a href="privacidad.php" target="_blank">Política de Privacidad</a> y el <a href="aviso-legal.php" target="_blank">Aviso Legal</a>.</label>
            </div>
          </div>
        </div>
        <!-- /.col-md-10 -->
        <div style="margin-top: 20px; margin-bottom: 20px; border-bottom: 1px solid rgba(0, 0, 0, 0.1);"></div>
        <div class="col-md-12">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="enviar">Registrarme</button>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col-md-12 -->
        <div class="separacion-tablas"></div>
        <!--
          <div class="form-group">
              <div class="col-xs-offset-3 col-xs-9">
          <a href="http://login.ivao.aero/index.php?url=http://ar.ivao.aero/ivao/ar/login-web.php" class="btn btn-default btn-lg btn-block" role="button">Autenticar HQ</a>
          
          <input type="submit" class="btn btn-primary btn-lg btn-block" name="enviar" value="Registrarme"></div>
            </div>
          </div> -->
        <br />
      </form>
    </div>
    <!-- /.tabla-novedades -->
<script>
$.datetimepicker.setLocale('es'); 
$('#birthday').datetimepicker({yearStart: '1930', timepicker: false, format: 'Y-m-d'});
</script>

  </section>
@endsection