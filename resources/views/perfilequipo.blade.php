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
<div class="container margin-top-15 margin-bot-15 col-md-10" >
	<div class="card">
		<div class="card-body no-bordes">
			<!-- Introduction Row -->
			<input type="hidden" name="idequipo" id="idequipo" value="{{$idequipo}}">
			<input type="hidden" name="idlider" id="idlider" value="{{$lider}}">
			<h1 class="my-4" id="tituloequipo">{{$equipo->nombreequipo}}</h1>
			<h1 class="my-4">
				@if(Auth::check())
				@if(Auth::user()->id == $lider)
				<small><a data-toggle="modal" data-target="#editarmodal" class="float-right heredar-color btn btn-warning col-sm-12 col-md-4" >Editar Informacion <i class="fa fa-lg fa-fw fa-pencil-square"></i></a></small>
				@endif
				@endif

			</h1>
			<br>
			@if($equipo->mensaje == null)
			Bienvenido a la pagina de perfil de los integrantes del equipo {{$equipo->nombreequipo}}
			@else
			<h5 class="col-sm-10" id="mensajeequipo">{{$equipo->mensaje}}</h5>
			@endif
			<!-- Team Members Row -->
			<div class="row">
				<div class="col-lg-12">
					<h2 class="my-4">Nuestro Equipo <br>
						@if(Auth::check())
						@if(Auth::user()->id == $lider)<button  data-toggle="modal" data-target="#agregarusuario" class="btn btn-sm btn-success col-sm-6 col-md-4 col-lg-3" >Agregar Miembro <i class="fa fa-lg fa-user-plus"></i>
						</button>
						@endif
						@endif
						<a href="/listaproyectosequipo/{{$equipo->id}}" class="btn btn-sm btn-primary offset-sm-0 offset-lg-4 offset-md-0 col-sm-6 col-md-4 col-lg-3" >Proyectos del Equipo<i class="fa fa-lg fa-laptop"></i>
						</a>
						
					</h2>
				</div>
				@foreach($miembros as $key)
				<div class="col-lg-4 col-sm-6 text-center mb-4 borde-usuarios" >
					@if(Auth::check())
					<button data-toggle="modal" data-target="#curriculum" class="btn btn-info btn-sm offset-4 pos-abs" href=""><i class="fa fa-lg fa-file-text-o"></i></button>
					@endif
					
					@if($key->id == $lider)
					@if($key->imagen != null)
					<a href="/perfilalumno/{{$key->id}}"  class="rounded-circle  d-block"><img class="rounded-circle img-fluid d-block mx-auto borde-lider"	 src="<?php echo asset("storage/usuarios/perfil/imagenes")?>/{{$key->imagen}}"  alt="/img/profile.png"></a>
					@else
					<a  href="/perfilalumno/{{$key->id}}"  class="rounded-circle  d-block"><img class="rounded-circle img-fluid d-block mx-auto borde-lider"	 src="/img/profile.png" alt=""></a>
					@endif

					@else
					@if($key->imagen != null)
					<a href="/perfilalumno/{{$key->id}}" class="rounded-circle  d-block"><img  class="rounded-circle img-fluid d-block mx-auto img-alumno" src="<?php echo asset("storage/usuarios/perfil/imagenes")?>/{{$key->imagen}}" alt=""></a>
					@else
					<a href="/perfilalumno/{{$key->id}}" class="rounded-circle  d-block"><img  class="rounded-circle img-fluid d-block mx-auto img-alumno" src="/img/profile.png" alt=""></a>
					@endif
					@endif
					
					
					
					@if($key->id == $lider)
					<h3 class="text-uppercase">{{$key->name}}<br>
						<small>Lider</small>
					</h3>
					@else
					@if($key->pivot->titulo != null)
					<h3 class="text-uppercase">{{$key->name}}<br>
						<small>{{$key->pivot->titulo}}</small>
					</h3>
					@else
					<h3 class="text-uppercase">{{$key->name}}<br>
						<small>MIEMBRO</small>
					</h3>
					@endif
					@if(Auth::check())
					@if(Auth::user()->id == $lider)
					<div class="offset-7">
						<button id="editar" name="editar"  data-toggle="modal" value="{{$key->id}}" accesskey="{{$key->pivot->titulo}}" data-target="#editartitulo" type="button" class="editarbtn btn btn-warning btn-sm col-1 letras-blancas cent-button"><i class="fa fa-lg fa-pencil cent-icon"></i></button>
						<button id="eliminar" accesskey="{{$key->id}}" name="eliminar" data-toggle="modal" value="{{$key->id}}" data-target="#confirm-delete" type="button" class="eliminarbtn btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-ban cent-icon"></i></button>
					</div> 
					@endif
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
				<button id="modeliminar" name="modeliminar" data-dismiss="modal" class="btn btn-danger btn-ok">Borrar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editartitulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<input type="hidden" name="editarmiembro" id="editarmiembro">
					<label for="titulo" class="col-md-12 offset-md-3 control-label">Titulo</label>
					<input id="titulomodal"  type="text" class="form-control no-bordes" name="titulomodal"  placeholder="Nuevo Titulo" required="required" data-validation-required-message="Ingresa titulo">
				</div>

			</div>
			<div class="modal-footer align-content-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="modeditar" name="modeditar" data-dismiss='modal' class="btn btn-primary btn-ok">Confirmar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" >
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
										<input id="editnombre" type="text" class="form-control" name="editnombre" placeholder="Nuevo Nombre" required="required" data-validation-required-message="Ingresa tu Nombre">
										<p class="help-block text-danger"></p>
										
									</div>
								</div>
							</div>
							<div class="control-group" >
								<div class="form-group floating-label-form-group controls mb-0 pb-2">
									<label for="editmensaje" class="col-md-12 offset-md-3 control-label">Mensaje</label>
									<input id="editmensaje" maxlength="190"  type="text" class="form-control" name="editmensaje"  placeholder="Mensaje del equipo" required="required" data-validation-required-message="Ingresa el mensaje del equipo">
									<p class="help-block text-danger"></p>

								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer align-content-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button class="btn btn-primary btn-ok" id="editmodalbutton">Aceptar</button>
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
        url: "/extratags/"+$("#idequipo").val(),
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
	//Script de modals
	$('.eliminarbtn').click(function(){
		$alumno = $(this).val();
		$('#borraralumno').val($alumno);
		console.log($('#borraralumno').val());
	});
	$('.editarbtn').click(function(){
		$id = $(this).val();
		$titulo = $(this).attr("accesskey");
		$('#editarmiembro').val($id);
		$('#editarmiembro').attr('accesskey',$titulo);
		console.log($('#editarmiembro').val());
		console.log($('#editarmiembro').attr("accesskey"));
	});
		//Esto es la funcionabilidad del boton para agregar usuarios al equipo
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
		setTimeout(location.reload.bind(location), 200);
	});
	$('#editmodalbutton').click(function(){
		console.log("click");
		if ($('#editnombre').val() != null && $('#editmensaje').val() != null){ 
		
		$data ={
			
			
			"_token":$("input[name*='_token']").val(),
			"idequipo":$("#idequipo").val(),
			"lider":$("#idlider").val(),};
			if ($('#editnombre').val() != null) {
				//$data.add("nombre",$('#editnombre').val());
				$data.nombre = $('#editnombre').val();
			}
			if ($('#editmensaje').val() != null) {
				//$data.add("mensaje",$('#editmensaje').val());
				$data.mensaje = $('#editmensaje').val();
			}
			
		console.log($data);
		$.ajax({
				url     : "/modaleditar",
				type    : "post",
				dataType: "JSON",
				data    : $data,
				success : function($r){console.log($r.mensaje);}
			});
		
		
		};
		
		$('#editarmodal').modal('toggle');
		setTimeout(location.reload.bind(location), 200);
	});

	$('#modeliminar').click(function(){
		console.log($('#borraralumno').val());
		$data = { 
			'idalumno':$('#borraralumno').val(),
			"idequipo":$("#idequipo").val(),
			"_token":$("input[name*='_token']").val(),
		}

		$.ajax({
				url     : "/modalborrar",
				type    : "post",
				dataType: "JSON",
				data    : $data,
				success : function($r){location.reload();}
			});
		setTimeout(location.reload.bind(location), 200);
	});
	$('#modeditar').click(function(){
		console.log($('#editarmiembro').val());
		if ($("#titulomodal").val() != null) {
			$data = { 
			'idalumno':$('#editarmiembro').val(),
			"idequipo":$("#idequipo").val(),
			"lider":$("#idlider").val(),
			"titulo":$("#titulomodal").val(),
			"_token":$("input[name*='_token']").val(),
		}

		$.ajax({
				url     : "/modaleditartitulo",
				type    : "post",
				dataType: "JSON",
				data    : $data,
				success : function($r){}
			});
		}
		else {console.log('vacio');}
		setTimeout(location.reload.bind(location), 200);
	});

	});
</script>
@endsection