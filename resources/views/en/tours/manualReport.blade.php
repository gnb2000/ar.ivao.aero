@extends('template')

@section('titulo')
<title>Tour Report :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/datepicker/build/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="/assets/tinymce/tinymce.min.js"></script>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

<div class="container marketing">
<h2>Tours <small> Report Leg</small><br /></h2>
                        
<div class="separacion-tablas"></div>
            
@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('TourController@manualReport')}}" method="post" role="form">
@csrf

<fieldset>
<div class="form-group col-md-4">
    <label class="control-label" for="tour">Tour</label>  
    <select id="tour" name="tour" class="form-control input-md" required>
    <option value="">Select...</option>
    @foreach($tours as $tour)
    <option value="{{$tour->id}}">{{$tour->name}}</option>
    @endforeach
    </select>
</div>

<div class="form-group col-md-4">
  <label class="control-label" for="leg">Leg</label>
  <input class="form-control input-md"  id="leg" name="leg" maxlength="2" type="text" required />
</div>

<div class="form-group col-md-4">
  <input name="lang" value="en" type="hidden"/>
</div>

<div class="form-group col-md-4">
  <label class="control-label" for="callsign">Callsign</label>
  <input class="form-control input-md"  id="callsign" name="callsign" maxsize="2" type="text" required />
</div>

<div class="form-group col-md-4">
  <label class="control-label" for="fechainicio">Takeoff Time (UTC)</label>
  <input autocomplete="off" class="form-control input-md"  id="fechainicio" name="dep_time" type="text" required />
</div>

<div class="form-group col-md-4">
  <label class="control-label" for="fechafin">Landing Time (UTC)</label>
  <input autocomplete="off" class="form-control input-md"  id="fechafin" name="arr_time" type="text" required />
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="detalles">Remarks</label>  
  <div class="col-md-4">
      <textarea id="detalles" name="remarks" class="form-control input-md"></textarea>
  </div>
</div>

<hr style="margin-bottom:20px;">
      
<div class="form-group">
  <div class="btn-group">
    <button type="submit" class="btn btn-success">Report</button>
    <input type="reset" class="btn btn-warning" value="Restablecer" />
  </div>
</div>
</fieldset>
  
</form>
<script type="text/javascript">
$.datetimepicker.setLocale('es');
$('#fechainicio').datetimepicker({format: 'Y-m-d H:i', step: 5});
$('#fechafin').datetimepicker({format: 'Y-m-d H:i',  step: 5});

tinymce.init(
{
    setup: function (editor)
    {
        editor.on('change', function () {
        tinymce.triggerSave(); });
    },
    theme: 'silver',
    selector: '#detalles',
    height: 400,
    width: 800,
    plugins: 
    [
    'advlist autolink autosave textcolor colorpicker lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen bbcode',
    'insertdatetime media save table contextmenu paste code'
    ],
    toolbar: 
    [
    'insertfile undo redo | styleselect | bold italic | forecolor backcolor fontselect fontsizeselect',
    'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    ],
    content_css:
    [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});
</script>

  <!-- INICIO TABLA -->
   </div><!-- /.container -->
</section>
@endsection