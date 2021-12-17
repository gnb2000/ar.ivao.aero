@extends('template')

@section('titulo')
<title>Staff :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
	<div class="container marketing">

  <!-- CONTENIDO -->
<div class="tabla-novedades">
    
    <div role="tabpanel">
  	<div class="row">

        <div class="col-3">

            <div class="list-group" role="tablist">
              <a class="list-group-item list-group-item-action active" id="hq-item" data-bs-toggle="list" href="#hq" aria-controls="hq" role="tab" ><i class="fas fa-angle-double-right"></i>&nbsp; Direcci&oacute;n</a>
              <a class="list-group-item list-group-item-action" id="ops-item" data-bs-toggle="list" href="#ops" aria-controls="ops" role="tab"><i class="fas fa-angle-double-right"></i>&nbsp; Operaciones</a>
              <a class="list-group-item list-group-item-action" id="web-item" data-bs-toggle="list" href="#web" aria-controls="web" role="tab"><i class="fas fa-angle-double-right"></i>&nbsp; Desarrollo Web</a>
              <a class="list-group-item list-group-item-action" id="training-item" data-bs-toggle="list" href="#training" aria-controls="training" role="tab"><i class="fas fa-angle-double-right"></i>&nbsp; Entrenamiento</a>
              <a class="list-group-item list-group-item-action" id="eventos-item" data-bs-toggle="list" href="#eventos" aria-controls="eventos" role="tab"><i class="fas fa-angle-double-right"></i>&nbsp; Eventos</a>
              <a class="list-group-item list-group-item-action" id="rrpp-item" data-bs-toggle="list" href="#rrpp" aria-controls="rrpp" role="tab"><i class="fas fa-angle-double-right"></i>&nbsp; Relaciones P&uacute;blicas</a>
              <a class="list-group-item list-group-item-action" id="miembros-item" data-bs-toggle="list" href="#miembros" aria-controls="miembros" role="tab"><i class="fas fa-angle-double-right"></i>&nbsp; Miembros</a>
              <a class="list-group-item list-group-item-action" id="fir-item" data-bs-toggle="list" href="#fir" aria-controls="fir" role="tab"><i class="fas fa-angle-double-right"></i>&nbsp; Jefaturas FIR</a>
            </div><!-- /.list-group -->

        </div><!-- /.col-md-3 -->
        <div class="col-9">

              <!-- Tab panes -->
            <div class="tab-content">

            <div class="tab-pane fade show active" id="hq" aria-labelled-by="hq-item" role="tabpanel">
			    <h2>Direcci&oacute;n</h2>
				<div class="separacion-tablas"></div>

            <div class="row">
            @foreach($HQ as $staff)

				<div class="col">
					<div class="card mb-4">
						<img alt="staff" style="width: 150px; height: 200px;" src="/img/staff/{{$staff->vid}}.jpg" class="card-img-top" title="{{$staff->vid}}">
						<div class="card-body">
							<h6 class="card-title"><a href="https://www.ivao.aero/staff/details.asp?Id={{$staff->position}}" title="Ir a la ficha">{{$staff->name}}</a></h6>
							<p class="card-text">{{$staff->full_position}}</p>
						</div>
					</div>
				</div>
				
			@endforeach
			</div> <!-- /.row -->

			</div><!-- /.tabpanel -->

			<div class="tab-pane fade show" id="ops" aria-labelled-by="ops-item" role="tabpanel">
				    <h2>Operaciones</h2>
					<div class="separacion-tablas"></div>

            <div class="row">
            @foreach($OPS as $staff)

				<div class="col">
					<div class="card mb-4">
						<img alt="staff" style="width: 150px; height: 200px;" src="/img/staff/{{$staff->vid}}.jpg" class="card-img-top" title="{{$staff->vid}}">
						<div class="card-body">
							<h6 class="card-title"><a href="https://www.ivao.aero/staff/details.asp?Id={{$staff->position}}" title="Ir a la ficha">{{$staff->name}}</a></h6>
							<p class="card-text">{{$staff->full_position}}</p>
						</div>
					</div>
				</div>
			
			@endforeach
			</div> <!-- /.row -->
			</div><!-- /.tabpanel -->

			<div class="tab-pane fade" id="web" aria-labelled-by="web-item" role="tabpanel">
				    <h2>Desarrollo Web</h2>
					<div class="separacion-tablas"></div>
            <div class="row">
            @foreach($WEB as $staff)

				<div class="col">
					<div class="card mb-4">
						<img alt="staff" style="width: 150px; height: 200px;" src="/img/staff/{{$staff->vid}}.jpg" class="card-img-top" title="{{$staff->vid}}">
						<div class="card-body">
							<h6 class="card-title"><a href="https://www.ivao.aero/staff/details.asp?Id={{$staff->position}}" title="Ir a la ficha">{{$staff->name}}</a></h6>
							<p class="card-text">{{$staff->full_position}}</p>
						</div>
					</div>
				</div>
			
			@endforeach			
			</div> <!-- /.row -->
			</div><!-- /.tabpanel -->

			<div class="tab-pane fade" id="training" aria-labelled-by="training-item" role="tabpanel">
				    <h2>Entrenamiento</h2>
					<div class="separacion-tablas"></div>
            <div class="row">
            @foreach($TRAINING as $staff)

				<div class="col">
					<div class="card mb-4">
						<img alt="staff" style="width: 150px; height: 200px;" src="/img/staff/{{$staff->vid}}.jpg" class="card-img-top" title="{{$staff->vid}}">
						<div class="card-body">
							<h6 class="card-title"><a href="https://www.ivao.aero/staff/details.asp?Id={{$staff->position}}" title="Ir a la ficha">{{$staff->name}}</a></h6>
							<p class="card-text">{{$staff->full_position}}</p>
						</div>
					</div>
				</div>
			
			@endforeach			
			</div> <!-- /.row -->
			</div><!-- /.tabpanel -->

			<div class="tab-pane fade" id="eventos" aria-labelled-by="eventos-item" role="tabpanel">
				    <h2>Eventos</h2>
					<div class="separacion-tablas"></div>
            <div class="row">
            @foreach($EVENTS as $staff)

				<div class="col">
					<div class="card mb-4">
						<img alt="staff" style="width: 150px; height: 200px;" src="/img/staff/{{$staff->vid}}.jpg" class="card-img-top" title="{{$staff->vid}}">
						<div class="card-body">
							<h6 class="card-title"><a href="https://www.ivao.aero/staff/details.asp?Id={{$staff->position}}" title="Ir a la ficha">{{$staff->name}}</a></h6>
							<p class="card-text">{{$staff->full_position}}</p>
						</div>
					</div>
				</div>
			
			@endforeach			
			</div> <!-- /.row -->
			</div><!-- /.tabpanel -->

			<div class="tab-pane fade" id="rrpp" aria-labelled-by="rrpp-item" role="tabpanel">
				    <h2>Relaciones P&uacute;blicas</h2>
					<div class="separacion-tablas"></div>
            <div class="row">
            @foreach($PR as $staff)

				<div class="col">
					<div class="card mb-4">
						<img alt="staff" style="width: 150px; height: 200px;" src="/img/staff/{{$staff->vid}}.jpg" class="card-img-top" title="{{$staff->vid}}">
						<div class="card-body">
							<h6 class="card-title"><a href="https://www.ivao.aero/staff/details.asp?Id={{$staff->position}}" title="Ir a la ficha">{{$staff->name}}</a></h6>
							<p class="card-text">{{$staff->full_position}}</p>
						</div>
					</div>
				</div>
			
			@endforeach			
			</div> <!-- /.row -->
			</div><!-- /.tabpanel -->

			<div class="tab-pane fade" id="miembros" aria-labelled-by="miembros-item" role="tabpanel">
				    <h2>Miembros</h2>
					<div class="separacion-tablas"></div>
            <div class="row">
            @foreach($MEMBERS as $staff)

				<div class="col">
					<div class="card mb-4">
						<img alt="staff" style="width: 150px; height: 200px;" src="/img/staff/{{$staff->vid}}.jpg" class="card-img-top" title="{{$staff->vid}}">
						<div class="card-body">
							<h6 class="card-title"><a href="https://www.ivao.aero/staff/details.asp?Id={{$staff->position}}" title="Ir a la ficha">{{$staff->name}}</a></h6>
							<p class="card-text">{{$staff->full_position}}</p>
						</div>
					</div>
				</div>
			
			@endforeach			
			</div> <!-- /.row -->
			</div><!-- /.tabpanel -->

			<div class="tab-pane fade" id="fir" aria-labelled-by="fir-item" role="tabpanel"> 
				    <h2>Jefaturas de FIR</h2>
					<div class="separacion-tablas"></div>
            <div class="row">
            @foreach($FIR as $staff)

				<div  class="col">
					<div class="card mb-4">
						<img alt="staff" style="width: 150px; height: 200px;" src="/img/staff/{{$staff->vid}}.jpg" class="card-img-top" title="{{$staff->vid}}">
						<div class="card-body">
							<h6 class="card-title"><a href="https://www.ivao.aero/staff/details.asp?Id={{$staff->position}}" title="Ir a la ficha">{{$staff->name}}</a></h6>
							<p class="card-text">{{$staff->full_position}}</p>
						</div>
					</div>
				</div>
			
			@endforeach			
			</div> <!-- /.row -->
			</div> <!-- /.tabpanel -->
		</div> <!-- /.col9 -->  
	</div> <!-- /.row -->      
	</div> <!-- /.tabpanel -->
</section>
@endsection