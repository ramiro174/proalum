@extends('layouts.master')

@section('styles')
<style type="text/css">


body{
  background-color: #e2e2e2;
}

</style>
@endsection
@section('content')
<div class="container margin-top-15 margin-bot-15" >
  <div class="card">
    <div class="card-body no-bordes">
      <!-- Introduction Row -->
      <h1 class="my-4">Nombre del Equipo
        <small>Mensaje del Equipo<a data-toggle="modal" data-target="#editar" class="offset-1 heredar-color btn btn-warning" >Editar Informacion <i class="fa fa-lg fa-fw fa-pencil-square"></i></a></small>
      </h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, explicabo dolores ipsam aliquam inventore corrupti eveniet quisquam quod totam laudantium repudiandae obcaecati ea consectetur debitis velit facere nisi expedita vel?</p>

      <!-- Team Members Row -->
      <div class="row">
        <div class="col-lg-12">
          <h2 class="my-4">Nuestro Equipo</h2>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="img/profile.png" alt="">
          <h3>John Smith
            <small>Titulo</small>
          </h3>
          <div class="offset-7">
            <button data-toggle="modal" data-target="#editartitulo" type="button" class="btn btn-warning btn-sm col-1 letras-blancas cent-button"><i class="fa fa-lg fa-pencil cent-icon"></i></button>
            <button data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-ban cent-icon"></i></button>
          </div>         
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="img/profile.png" alt="">
          <h3>John Smith
            <small>Titulo</small>
          </h3>
          <div class="offset-7">
            <button data-toggle="modal" data-target="#editartitulo" type="button" class="btn btn-warning btn-sm col-1 letras-blancas cent-button"><i class="fa fa-lg fa-pencil cent-icon"></i></button>
            <button data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-ban cent-icon"></i></button>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="img/profile.png" alt="">
          <h3>John Smith
            <small>Titulo</small>
          </h3>
          <div class="offset-7">
            <button data-toggle="modal" data-target="#editartitulo" type="button" class="btn btn-warning btn-sm col-1 letras-blancas cent-button"><i class="fa fa-lg fa-pencil cent-icon"></i></button>
            <button data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-ban cent-icon"></i></button>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="img/profile.png" alt="">
          <h3>John Smith
            <small>Titulo</small>
          </h3>
          <div class="offset-7">
            <button data-toggle="modal" data-target="#editartitulo" type="button" class="btn btn-warning btn-sm col-1 letras-blancas cent-button"><i class="fa fa-lg fa-pencil cent-icon"></i></button>
            <button data-toggle="modal" data-target="#confirm-delete"  type="button" class="btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-ban cent-icon"></i></button>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="img/profile.png" alt="">
          <h3>John Smith
            <small>Titulo</small>
          </h3>
          <div class="offset-7">
            <button data-toggle="modal" data-target="#editartitulo" type="button" class="btn btn-warning btn-sm col-1 letras-blancas cent-button"><i class="fa fa-lg fa-pencil cent-icon"></i></button>
            <button data-toggle="modal" data-target="#confirm-delete"  type="button" class="btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-ban cent-icon"></i></button>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="img/profile.png" alt="">
          <h3>John Smith
            <small>Titulo</small>
          </h3>
          <div class="offset-7">
            <button data-toggle="modal" data-target="#editartitulo" type="button" class="btn btn-warning btn-sm col-1 letras-blancas cent-button"><i class="fa fa-lg fa-pencil cent-icon"></i></button>
            <button data-toggle="modal" data-target="#confirm-delete"  type="button" class="btn btn-danger btn-sm col-1 cent-button"><i class="fa fa-lg fa-ban cent-icon"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        ¿Estas seguro que quieres eliminar a este usuario de tu equipo?
      </div>
      <div class="modal-body">
        Eliminar a (nombre de usuario)
      </div>
      <div class="modal-footer align-content-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-danger btn-ok">Borrar</button>
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
@endsection