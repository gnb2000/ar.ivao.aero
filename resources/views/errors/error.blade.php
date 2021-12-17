@extends('template')

@section('titulo')
<title>Error :: IVAO Argentina</title>
@endsection

@section('contenido')
<section class="py-5 text-center">
	@if($codigo == 401)
		<h1 class="alert alert-danger">401 Usuario no logueado</h1>
	@elseif($codigo == 'A03')
		<h1 class="alert alert-danger">A03 Usuario no activo. Compruebe su email.</h1>
	@elseif($codigo == 'A04')
		<h1 class="alert alert-danger">A04 No eres de miembro de IVAO Argentina ni tienes GCA en dicha division</h1>
	@else 
		<h1 class="alert alert-danger">403 Acceso Restringido</h1>
	@endif
</section>
@endsection