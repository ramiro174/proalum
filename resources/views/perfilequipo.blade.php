@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/bootstrap-tagsinput.css">
<style type="text/css">
body{
	background-color: #e2e2e2;
}
</style>
@endsection
@section('scripts')
<script type="text/javascript" src="/js/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="/js/typeahead.js"></script>   
@endsection
@section('content')
<div class="container margin-top-15 margin-bot-15" >
	<div class="card">
		<div class="card-body no-bordes">
			<!-- Introduction Row -->
			<input type="hidden" name="idequipo" id="idequipo" value="{{$idequipo}}">
			<input type="hidden" name="idlider" id="idlider" value="{{$lider}}">
			<h1 class="my-4">{{$equipo->nombreequipo}}
				@if(Auth::check())<small><a data-toggle="modal" data-target="#editar" class="float-right heredar-color btn btn-warning" >Editar Informacion <i class="fa fa-lg fa-fw fa-pencil-square"></i></a></small> @endif

			</h1>
			
			
			<p>{{$equipo->mensaje}}</p>

			<!-- Team Members Row -->
			<div class="row">
				<div class="col-lg-12">
					<h2 class="my-4">Nuestro Equipo 
						@if(Auth::check())
						@if(Auth::user()->id == $lider)<button  data-toggle="modal" data-target="#agregarusuario" class="btn btn-sm btn-success" >Agregar Miembro <i class="fa fa-lg fa-user-plus"></i>
						</button>
						@endif
						@endif
						<a href="/listaproyectosequipo" class="btn btn-sm btn-primary offset-sm-0 offset-lg-4 offset-md-0" >Proyectos del Equipo<i class="fa fa-lg fa-laptop"></i>
						</a>
						
					</h2>
				</div>
				@foreach($miembros as $key)
				<div class="col-lg-4 col-sm-6 text-center mb-4 borde-usuarios" >
					<button data-toggle="modal" data-target="#curriculum" class="btn btn-info btn-sm offset-4 pos-abs" href=""><i class="fa fa-lg fa-file-text-o"></i></button>
					@if($key->id == $lider)
					<img  style="border-color: green; border-style: inherit;" class="rounded-circle img-fluid d-block mx-auto" src="/img/profile.png" alt="">
					@else
					<img  class="rounded-circle img-fluid d-block mx-auto" src="/img/profile.png" alt="">
					@endif
					
					<h3 class="text-uppercase">{{$key->name}}<br>
						<small>Desarrollador</small>
					</h3>@if(Auth::check())
					@if(Auth::user()->id == $lider)
					<div class="offset-7">
						<button id="editar" name="editar"  data-toggle="modal" value="{{$key->id}}" data-target="#editartitulo" type="button" class="btn btn-warning btn-sm col-1 letras-blancas cent-button"><i class="fa fa-lg fa-pencil cent-icon"></i></button>
						<button id="eliminar" name="eliminar" data-toggle="modal" value="{{$key->id}}" data-target="#confirm-delete" type="button" class="btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-ban cent-icon"></i></button>
					</div> 
					@endif 
					@endif

				</div>
				@endforeach
				
		</div>
	</div>
</div>
<!--Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header fuente">
				¿Estas seguro que quieres eliminar a este usuario de tu equipo?
			</div>
			<div class="modal-body fuente">
				Eliminar a (nombre de usuario)
				<input type="hidden" name="borraralumno" id="borraralumno">
			</div>
			<div class="modal-footer align-content-center">
				<button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="modeliminar" name="modeliminar" class="btn btn-danger btn-ok">Borrar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editartitulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label for="titulo" class="col-md-12 offset-md-3 control-label">Titulo</label>
					<input id="titulo"  type="text" class="form-control no-bordes" name="titulomodal"  placeholder="Nuevo Titulo" required="required" data-validation-required-message="Ingresa titulo">
				</div>

			</div>
			<div class="modal-footer align-content-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button class="btn btn-primary btn-ok">Confirmar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card  col-md-12">
					<div class="card-body text-primary">
						<h2 class="text-center text-uppercase text-secondary mb-0">Informacion del Equipo</h2>

						<form class="form-horizontal" method="POST" action="">
							{{ csrf_field() }}
							<div class="control-group">
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
									<label for="name"  class="col-md-6 offset-md-3 control-label">Nombre del equipo</label>   
									<div class="col-md-12 col-sm-12">
										<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nuevo Nombre" required="required" data-validation-required-message="Ingresa tu Nombre">
										<p class="help-block text-danger"></p>
										@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>
							<div class="control-group" >
								<div class="form-group floating-label-form-group controls mb-0 pb-2">
									<label for="email" class="col-md-12 offset-md-3 control-label">Correo Electronico</label>
									<input id="email"  type="email" class="form-control" name="email"  placeholder="Mensaje del equipo" required="required" data-validation-required-message="Ingresa el mensaje del equipo">
									<p class="help-block text-danger"></p>

								</div>
							</div>
							<div class="control-group">
								<div class="form-group floating-label-form-group controls mb-0 pb-2">
									<label>Descripcion</label>
									<textarea class="form-control" id="message" rows="3" placeholder="Descripcion" required="required" data-validation-required-message="Completa este campo."></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer align-content-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button class="btn btn-primary btn-ok">Aceptar</button>
			</div>
		</div>
	</div>

</div>    
<div class="modal fade" id="agregarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="floating-label-form-group controls mb-0 pb-2">
					<label for="email" class="col-md-12 offset-md-3 control-label">Miembros del Equipo</label>
					<input id="miembros"  type="text" class="form-control" name="miembros"  placeholder="Miembros del Equipo" required="required" data-validation-required-message="Completa este Campo" data-role="tagsinput">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="modal-footer align-content-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="agregar" name="agregar" class="btn btn-success btn-ok">Agregar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="curriculum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header fuente">
				¿Descargar Curriculum?
			</div>
			<div class="modal-body">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<a href="prueba.txt" download="curriculumprueba" class="btn btn-primary btn-bs">Descargar <i class="fa fa-lg fa-download"></i></a>
			</div>      
		</div>
	</div>
</div>
</div>
@endsection
@section('scriptsAdicionales')
<script type="text/javascript">
	$(document).ready(function () {


		//Autocompletado para el buscador de alumnos
		var engine = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch: {
        url: "/llenartags",
        cache: false,
        filter: function(list) {
          return $.map(list, function(name) {
            return { name: name.name,id: name.id };
            
          });
        }
      }
    });
    engine.initialize();

		$('input#miembros').tagsinput({
      itemValue: 'id',
      itemText: 'name',
      typeaheadjs: {
        name: 'nombre',
        displayKey:'name',
        source: engine.ttAdapter()
      }
    });
	//JQuery de modals
	$('#eliminar').click(function(){
		$alumno = $('#eliminar').val();
		$('#borraralumno').val($alumno);
		console.log($('#borraralumno').val());
	});		
	$('#agregar').click(function(){
		console.log("click");
		$data ={
			"miembros":$('#miembros').val(),
			"_token":$("input[name*='_token']").val(),
			"idequipo":$("#idequipo").val(),
			"lider":$("#idlider").val(),};
		console.log($data);
		$.ajax({
				url     : "/modalagrega",
				type    : "post",
				dataType: "JSON",
				data    : $data,
				success : function($r){console.log($r);}
			});
		$('#agregarusuario').modal('toggle');
		$('miembros').val(null);
		console.log($('miembros').val());
	});
			

	});
</script>
@endsection