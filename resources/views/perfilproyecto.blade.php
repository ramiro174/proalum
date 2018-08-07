@extends('layouts.master')

@section('styles')
@endsection

@section('content')
<div class="container margin-bot-15 margin-top-15" >
	<div class="row">
		<!-- Portfolio Item Heading -->
		<input type="hidden" name="idproyecto" id="idproyecto" value="{{$proyecto->id}}">
		<h1 class="my-4" id="nombreproyecto">{{$proyecto->nombre_proyecto}}
			<small><a href="/teamprofile/{{$equipo->id}}">{{$equipo->nombreequipo}}</a> </small><br>
			@if($proyecto->vinculo != null)
			<a href="{{$proyecto->vinculo}}" class="btn btn-dark" >Vinculo Github <i class="fa fa-lg fa-fw fa-github"></i></a>
			@if(Auth::check())
			@if(Auth::user()->id == $lider)
			<button  data-toggle="modal" data-target="#confirm-delete-vinculo"  type="button" class="eliminarvinculobtn btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-times-circle-o cent-icon"></i></button>
			@endif
			@endif
			
			@else
			<button class="btn btn-dark" disabled="">Vinculo Github <i class="fa fa-lg fa-fw fa-github"></i>
			</button>
			@if(Auth::check())
			@if(Auth::user()->id == $lider)
			<button  data-toggle="modal" data-target="#confirm-add-vinculo"  type="button" class="agregarvinculobtn btn btn-success btn-sm col-1 cent-button"><i class="fa fa-lg fa-plus-circle cent-icon"></i></button>
			@endif
			@endif
			
			@endif
			@if(Auth::check())
			@if(Auth::user()->id == $lider)
			<button id="btneditar" name="btneditar" data-toggle="modal" data-target="#editar" class="btn btn-sm btn-warning offset-md-5 offset-lg-5 no-bordes" href="">Editar<i class="fa fa-fw fa-pencil"></i></button>
			<button id="btn-cambiar-imagen" name="btn-cambiar-imagen" data-toggle="modal" data-target="#modal-cambiar-imagen" class="btn btn-sm btn-warning  no-bordes" href="">Imagen<i class="fa fa-fw fa-picture-o"></i></button>
			@endif
			@endif
		</h1>

		<!-- Portfolio Item Row -->
		<div class="row">

			<div class="col-md-8">

				@if($proyecto->imagen != null)
				<img class="proyecto-img-medida img-fluid" src="<?php echo asset("storage/proyectos")?>/{{$proyecto->imagen}}" alt="">
				@else
				<img class="img-fluid" src="http://placehold.it/750x400" alt="">
				@endif
				
			</div>

			<div class="col-md-4">
				<h3 class="my-3">Descripcion del Proyecto</h3>
				<div class="esconder-texto">
					<h5 >{{$proyecto->descripcion}}</h5>
				</div>
				<button data-toggle="modal" data-target="#descmodal" type="button" class="float-right  btn btn-primary btn-sm col-1 cent-button"><i class="fa fa-lg fa-plus cent-icon"></i></button>     
			</div>

		</div>
	</div>
	<br>
	<!-- /.row -->
	<div class="row">
		<h3 class="col-md-10 col-lg-10 col-sm-12">Detalles</h3> 
		@if(Auth::check())
		@if(Auth::user()->id == $lider)

		<button data-toggle="modal" data-target="#agregarmodal" class="col-md-2 col-lg-2 col-sm-10 btn btn-sm btn-success boton-detalles">Agregar</button> <br>
		@endif
		@endif
		<div class="row">
			<div class="card col-md-3 col-sm-6 mb-4  img-size-small" style="height: 0px"></div>
			<div class="card col-md-3 col-sm-6 mb-4  img-size-small" style="height: 0px"></div>
			<div class="card col-md-3 col-sm-6 mb-4  img-size-small" style="height: 0px"></div>
			<div class="card col-md-3 col-sm-6 mb-4  img-size-small" style="height: 0px"></div>

			@foreach($detalles as $key)
			<div class="card col-md-3 col-sm-6 mb-4  img-size-small">  

				@if($key->imagen != null)
				<a class="card-title heredar-color" href="#" ><img class="card-img img-fluid img-size-small" src="<?php echo asset("storage/proyectos/detalles")?>/{{$key->imagen}}" alt=""></a>
				<div class="card-img-overlay transparente">
					<a class="card-title heredar-color detalle-btn" href="#"accesskey="{{$key->imagen}}">
						<p class="card-text esconder-texto-lista"><strong>{{$key->descripcion}}</strong></p></a>
						@if(Auth::check())
						@if(Auth::user()->id == $lider)
						<button  data-toggle="modal" data-target="#confirm-delete" value="{{$key->id}}" type="button" class="float-right eliminarbtn btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-times-circle-o cent-icon"></i></button>
						@endif
						@endif
					</div>         
				</div>
				@else
				<img class="card-img img-fluid img-size-small img-small" src="/img/placeholderimg.png" alt="">
				<div class="card-img-overlay transparente">
					<a class="card-title heredar-color detalle-btn" href="#" accesskey="/img/placeholderimg.png">
						<p class="card-text esconder-texto-lista" >{{$key->descripcion}}</p></a>
						<button  data-toggle="modal" data-target="#confirm-delete" value="{{$key->id}}" type="button" class="float-right eliminarbtn btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-times-circle-o cent-icon"></i></button>
					</div>         
				</div>
				@endif
				
				@endforeach
				
			</div>
		</div>
		<!-- Related Projects Row -->
		<div class="row">
			<h3 class="my-4 col-12">Mas de {{$equipo->nombreequipo}}</h3>
			<br>
			<div class="row">
				<div class="card col-md-3 col-sm-10 mb-4  img-size-small" style="height: 0px;"></div>
				<div class="card col-md-3 col-sm-10 mb-4  img-size-small" style="height: 0px;"></div>
				<div class="card col-md-3 col-sm-10 mb-4  img-size-small" style="height: 0px;"></div>
				<div class="card col-md-3 col-sm-10 mb-4  img-size-small" style="height: 0px;"></div>
				@foreach($proyectos as $key)
				<div class="card col-md-3 col-sm-10 mb-4  img-size-small">                   

					<img class="card-img img-fluid img-size-small" src="<?php echo asset("storage/proyectos")?>/{{$key->imagen}}" alt="">

					<div class="card-img-overlay transparente" >
						<a class="card-title heredar-color" href="/perfilproyecto/{{$key->id}}"><h5>{{$key->nombre_proyecto}}</h5><br>
							<p class="card-text esconder-texto-lista ">{{$key->descripcion}}</p></a>

						</div>         
					</div>
					@endforeach

					<div class="card col-md-3 col-sm-10 mb-4  img-size-small">                   

						<img class="card-img img-fluid img-size-small" src="/img/placeholderimg.png" alt="">

						<div class="card-img-overlay transparente">
							<a class="card-title heredar-color" href=""><h5>Proyecto</h5><br>
								<p class="card-text esconder-texto-lista">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

							</div>         
						</div>
						<div class="card col-md-3 col-sm-10 mb-4 img-size-small">                   

							<img class="card-img img-fluid img-size-small img-small" src="/img/placeholderimg.png" alt="">

							<div class="card-img-overlay transparente">
								<a class="card-title heredar-color" href=""><h5>Proyecto</h5><br>
									<p class="card-text esconder-texto-lista">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

								</div>         
							</div>
						</div>
					</div>
				</div>

			</div>
			<!--Modal -->
			<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="card  col-md-12">
								<div class="card-body text-primary">


									<form class="form-horizontal" method="POST" action="">
										{{ csrf_field() }}
										<div class="control-group">
											<div class="form-group floating-label-form-group">
												<label for="name"  class="control-label">Nombre del Proyecto</label>   
												<div class="col-md-12 col-sm-12">
													<input id="nombre" type="text" class="form-control" name="nombre"  placeholder="Nuevo Nombre" >

												</div>
											</div>
										</div>

										<div class="control-group">
											<div class="form-group floating-label-form-group controls mb-0 pb-2">
												<label>Descripcion</label>
												<textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripcion" ></textarea>
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<input type="hidden" name="inputid" id="inputid" value="{{$proyecto->id}}">
									</form>
								</div>
							</div>
						</div>
						<div class="modal-footer align-content-center">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button class="btn btn-primary btn-ok" data-dismiss="modal" id="modalaceptar">Aceptar</button>
						</div>
					</div>
				</div>

			</div>  
			<div class="modal fade" id="agregarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('modalagregardetalle')}}">

							<div class="modal-body">
								<div class="card  col-md-12">
									<div class="card-body text-primary">


										{{ csrf_field() }}
										<div class="control-group">
											<div class="form-group floating-label-form-group">
												<label for="name"  class="control-label">Imagen</label>   
												<div class="col-md-12 col-sm-12">
													<input  class="btn col-sm-12 col-lg-12 col-md-12" accept="image/*"
													type="file" id="detalleimg"  name="detalleimg" >
												</div>
											</div>
										</div>
										<div class="control-group">
											<div class="form-group floating-label-form-group controls mb-0 pb-2">
												<label>Descripcion</label>
												<textarea class="form-control" required="required" id="detalledesc" name="detalledesc" rows="3" placeholder="Descripcion" ></textarea>
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<input type="hidden" name="inputiddetalle" id="inputiddetalle" value="{{$proyecto->id}}">

									</div>
								</div>
							</div>
							<div class="modal-footer align-content-center">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								<button class="btn btn-primary btn-ok" type="submit">Aceptar</button>
							</div>
						</form>
					</div>
				</div>

			</div>
			<div class="modal fade" id="descmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content col-12">
						<div class="modal-body col-12">
							<div class="card  col-md-12">
								<div class="card-body col-12">
									<h4>{{$proyecto->descripcion}}</h4>
								</div>
							</div>
						</div>
						<div class="modal-footer align-content-center">
							<button class="btn btn-primary btn-ok" data-dismiss="modal" >Ok</button>
						</div>
					</div>
				</div>
			</div> 
			<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header fuente">
							¿Estas seguro que quieres eliminar este detalle de tu Proyecto?
						</div>
						<div class="modal-body fuente">
							Eliminar Detalle
							<input type="hidden" name="borrardetalle" id="borrardetalle">
						</div>
						<div class="modal-footer align-content-center">
							<button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button id="modeliminar" name="modeliminar" data-dismiss="modal" class="btn btn-danger btn-ok">Borrar</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="confirm-delete-vinculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header fuente">
							¿Estas seguro que quieres eliminar el Vinculo a tu Proyecto?
						</div>
						<div class="modal-body fuente">
							Eliminar Vinculo

						</div>
						<div class="modal-footer align-content-center">
							<button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button id="modeliminarvinculo" name="modeliminarvinculo" data-dismiss="modal" class="btn btn-danger btn-ok">Borrar</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="confirm-add-vinculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="card  col-md-12">
								<div class="card-body text-primary">


									<form class="form-horizontal" method="POST" action="">
										{{ csrf_field() }}
										<div class="control-group">
											<div class="form-group floating-label-form-group">
												<label for="name"  class="control-label">Vinculo del Proyecto en GitHub</label>   
												<div class="col-md-12 col-sm-12">
													<input id="inputvinculo" type="text" class="form-control" name="inputvinculo"  placeholder="Vinculo de GitHub" >

												</div>
											</div>
										</div>



									</form>
								</div>
							</div>
						</div>
						<div class="modal-footer align-content-center">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button class="btn btn-primary btn-ok" data-dismiss="modal" id="modalagregarvinculo">Aceptar</button>
						</div>
					</div>
				</div>

			</div>
			<div class="modal fade" id="detallemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content col-12">
						<div class="modal-body col-12">
							<div class="card  col-md-12">
								<div class="card-body col-12">
									<img id="img-modal-detalle" class="col-12" name="img-modal-detalle" src="">

									<hr>
									<h4 id="desc-modal-detalle"></h4>
								</div>
							</div>
						</div>
						<div class="modal-footer align-content-center">
							<button class="btn btn-primary btn-ok" data-dismiss="modal" >Ok</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="modal-cambiar-imagen">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">

						<form method="POST" action="{{url('subirimagenproyecto')}}" files="true" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="modal-body">
								<input type="hidden" name="input-proyecto-id" id="input-proyecto-id" value="{{$proyecto->id}}">

								<input required="" class="btn col-sm-6 col-lg-12 col-md-12" accept="image/*" type="file" id="imagen"
								name="imagen" >
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary col-6 float-left" type="submit">Aceptar</button>
								<button class="btn btn-danger col-6" data-dismiss="modal">Cancelar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			@endsection
			@section('scriptsAdicionales')
			<script type="text/javascript">
				$(document).ready(function(){
					$('.eliminarbtn').click(function(){
						$detalle = $(this).val();
						$('#borrardetalle').val($detalle);
						console.log($('#borrardetalle').val());
					});
					$('.detalle-btn').click(function(){
						$descripcion = $(this).children('p').text();
						$source = $(this).attr('accesskey');
						console.log($source);
						$imagen = "<?php echo asset("storage/proyectos/detalles/")?>"+
						"/"+ $source;
						$('#img-modal-detalle').attr('src',$imagen);
						$('#desc-modal-detalle').text($descripcion);
						$('#detallemodal').modal('show');
					});

					$('#modalaceptar').click(function(){
						if ($('input#nombre').val() != null && $('textarea#descripcion').val() != null) {
							console.log("click");
							$data = {
								'idproyecto':$('input#inputid').val(),
								"_token":$("input[name*='_token']").val()
							};
							if ($('input#nombre').val() != null) {
								$data.nombre = $('input#nombre').val();
							}
							if ($('textarea#descripcion').val() != null) {
								$data.descripcion = $('textarea#descripcion').val();
							}
							$.ajax({
								url     : "/modaleditarproyecto",
								type    : "post",
								dataType: "JSON",
								data    : $data,
								success : function($r){console.log($r);}
							});    
						}
						setTimeout(location.reload.bind(location), 200);
					});
					$('#modeliminar').click(function(){
						console.log($('#borrardetalle').val());
						$data = { 
							'iddetalle':$('#borrardetalle').val(),

							"_token":$("input[name*='_token']").val(),
						}

						$.ajax({
							url     : "/modalborrardetalle",
							type    : "post",
							dataType: "JSON",
							data    : $data,
							success : function($r){location.reload();}
						});
						setTimeout(location.reload.bind(location), 200);
					});
					$('#modeliminarvinculo').click(function(){

						$data = { 
							'idproyecto':$('input#idproyecto').val(),
							"_token":$("input[name*='_token']").val(),
						}

						$.ajax({
							url     : "/modalborrarvinculo",
							type    : "post",
							dataType: "JSON",
							data    : $data,
							success : function($r){location.reload();}
						});
						setTimeout(location.reload.bind(location), 200);
					});
				});
				$('#modalagregarvinculo').click(function(){
					if ($('input#inputvinculo').val() != null) {
						console.log("click");
						$data = {
							'idproyecto':$('input#idproyecto').val(),
							'vinculo':$('input#inputvinculo').val(),
							"_token":$("input[name*='_token']").val()
						};

						$.ajax({
							url     : "/modalagregarvinculo",
							type    : "post",
							dataType: "JSON",
							data    : $data,
							success : function($r){console.log($r);}
						});    
					}
					setTimeout(location.reload.bind(location), 200);
				});
			</script>
			@endsection