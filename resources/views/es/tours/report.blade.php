@extends('template')

@section('titulo')
<title>Tour Report :: IVAO Argentina</title>
@endsection

@section('headextra')
<script type="text/javascript" src="/assets/tinymce/tinymce.min.js"></script>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGINA -->
<section>

<div class="container marketing">
<h2>Tours <small> Reportar Vuelo</small><br /></h2>
                        
<div class="separacion-tablas"></div>

@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('TourController@report', $flightID)}}" method="post">
  @csrf
<fieldset>

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="detalles">Tu reporte ha sido enviado para validaci&oacute;n manual. &iquest;Alg&uacute;n comentario para el validador?</label><br />
  <br />
  <center><textarea rows="8" cols="60" id="detalles" name="remarks"></textarea></center>
</div>

<div class="form-group">
  <div class="btn-group">
    <button type="submit" class="btn btn-success">Enviar</button>
    <input type="reset" class="btn btn-warning" value="Restablecer" />
  </div>
</div>

</fieldset>          
</form>

         </div><!-- /.tooltip-demo -->
        
        </div><!-- /.col-md-9 -->
	</div><!-- /.row -->
    
    </div><!-- /.tabla-novedades-->
    
    </div><!-- /.container -->
</div> <!-- /.contenidocentral -->
  
   <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">
  
  <!-- /END THE FEATURETTES -->
<script src="/js/GCA.js" type="text/javascript"></script>

  </section>
@endsection