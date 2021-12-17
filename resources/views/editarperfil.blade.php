@extends('template')

@section('titulo')
<title>Inicio :: IVAO Argentina</title>
@endsection

@section('contenido')     
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
<div class="container marketing">
  <div class="tooltip-web">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="tabla-novedades">
          <h2><i class="glyphicon glyphicon-user fa-fw"></i> Editar Perfil <small>{{$user->name}} {{$user->surname}}</small></h2>
          <hr style="margin-bottom:20px;">
          
            @include('flash::message')
            <form class="form-horizontal" action="{{action('UserController@editarPerfil', $user->vid)}}" method="post" role="form">
                @csrf
            <div class="form-group">
              <label><i class="fa fa-user fa-fw"></i> VID</label>
              <input class="form-control" placeholder="{{$user->vid}}" disabled="disabled">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label><i class="fa fa-user fa-fw"></i> Nombre</label>
              <input class="form-control" placeholder="{{$user->name}} {{$user->surname}}" disabled="disabled">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label><i class="fa fa-globe fa-fw"></i> Pais <span class="txt-red cursor" data-toggle="tooltip" data-placement="right" title="Requerido"> *</span> </label>
              <select class="form-control" name="pais" disabled>
                <option value="{{$user->country}}">{{$user->country}}</option>
              </select>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label for="discord"><i class="fab fa-discord fa-fw"></i> Discord</label>
              <input id="discord" class="form-control" name="discord" autocomplete="off" value="{{$user->discord}}" placeholder="jorgenewbery#1234">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label><i class="fa fa-envelope fa-fw"></i> Email <span class="txt-red cursor" data-toggle="tooltip" data-placement="right" title="Requerido"> *</span></label>
              <input class="form-control" name="email" autocomplete="off" value="{{$user->email}}" disabled="disabled" placeholder="Tu email">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label><i class="fa fa-comment fa-fw"></i> Comentarios:</label>
              <textarea class="form-control" name="obs_user" autocomplete="off" placeholder="Tus comentarios" rows="2">{{$user->obs_user}}</textarea>
            </div>
			
			<div class="form-group">
				<table style="width:100%">
					<tr>
						<td>
							<label><i class="fa fa-newspaper-o"></i> Consentimiento Discord:</label>
						</td>
						<td align="right">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-success">
									<input type="radio" name="consent" value="1" @if($user->consent) checked @endif required>
									<span class="glyphicon glyphicon-ok"></span> Si
								</label>
								<label class="btn btn-danger">
									<input type="radio" name="consent" value="0" @if(!$user->consent) checked @endif required>
									<span class="glyphicon glyphicon-ok"></span> No
								</label>
							</div><!-- /.btn-group -->
						</td>
					</tr>
				</table>
				<p class="form-control-static" align="justify">En relaci&oacute;n a Discord, estoy de acuerdo con la declaración de este <a href="/discord-consent">consentimiento</a> y que el procesamiento de mis datos puede ser llevado a cabo de acuerdo a la <a href="https://wiki.ivao.aero/en/home/worldtour/rules-regulations">pol&iacute;tica de privacidad</a>.</p>
            </div><!-- /.form-group -->
			<div class="form-group">
				<table style="width:100%">
					<tr>
						<td>
							<label><i class="fa fa-users"></i> Aparecer en el Directorio:</label>
						</td>
						<td align="right">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-success">
									<input type="radio" name="direc" value="1" @if($user->directory) checked @endif>
									<span class="glyphicon glyphicon-ok"></span> Si
								</label>
								<label class="btn btn-danger">
									<input type="radio" name="direc" value="0" @if(!$user->directory) checked @endif>
									<span class="glyphicon glyphicon-ok"></span> No
								</label>
							</div><!-- /.btn-group -->
						</td>
					</tr>
				</table>
				<p class="form-control-static" align="justify">¿Deseas aparecer en el directorio de miembros? De todas maneras tu perfil seguira siendo accesible.</p>
            </div><!-- /.form-group -->
			
			
            <div class="form-group">
              <label><i class="fa fa-camera fa-fw"></i> Fotografía Perfil:</label>
              <p class="form-control-static" align="justify">Si deseas actualizar tu fotografía de perfil, envía una imagen JPG donde se te identifique, con unas medidas de <strong>200x200 PX</strong> a <strong>ar-web@ivao.aero</strong> con el nombre {{$user->vid}}.jpg Recuerde que esta imagen será visible para los otros miembros de la División. IVAO Argentina se reserva el derecho a evaluar y rechazar de fotos enviadas que no cumplan con las normativas arriba.</p>
            </div>
            <!-- /.form-group -->
                        
            <hr style="margin-bottom:20px;">
            <input type="submit" class="btn btn-default" name="enviar" value="Guardar">
            <!--<a href="#" type="button" class="btn btn-default"><i class=""></i>  <strong>Guardar</strong></a>-->
                        
            <button type="reset" class="btn btn-default"><i class="fa fa-minus-square txt-red"></i> Borrar</button>
          </form>
        </div>
        <!-- /.tabla-novedades--> 
      </div>
      <!-- /.col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 --> 
    </div>
    <!-- /.tooltip --> 
    
  </div>
  <!-- /.container-marketing --> 
</div>
</div>

</div>
<!-- /.container --> 

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