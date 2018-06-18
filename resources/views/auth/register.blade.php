@extends('layouts.master')
@section('styles')
<style type="text/css"> body{ background-color: #e2e2e2;}</style>
@endsection
@section('content')
<div class="container letras-1-rem margin-top-15 margin-bot-15 col-md-7 col-sm-12 " >
    <div class="row">
      <div class="card  col-md-12">
          <div class="card-body text-primary">
            <h2 class="text-center text-uppercase text-secondary mb-0">Registrate</h2>
              <hr class="star-dark mb-5">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}
                  <div class="control-group">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                          <label for="name"  class="col-md-6 offset-md-3 control-label">Nombre</label>
                          <div class="col-md-12 col-sm-12">
                              <input id="name" autofocus="" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre" required="required" data-validation-required-message="Ingresa tu Nombre">
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
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                          <label for="email" class="col-md-12 offset-md-3 control-label">Correo Electronico</label>
                             <input id="email"  type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electronico" required="required" data-validation-required-message="Ingresa tu Correo Electronico">
                              <p class="help-block text-danger"></p>
                              @if ($errors->has('email'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                              @endif
                      </div>
                  </div>
                  <div class="control-group" >
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}
                              floating-label-form-group controls mb-0 pb-2">
                          <label for="password"  class="col-md-12 offset-md-3 control-label">Contraseña</label>
                              <input id="password"  type="password" class="form-control" name="password" placeholder="Contraseña" required="required" data-validation-required-message="Ingresa una Contraseña">
                              <p class="help-block text-danger"></p>
                              @if ($errors->has('password'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                              @endif
                      </div>
                  </div>
                  <div class="control-group" >
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                          <label for="password-confirm"  class="col-md-12 offset-md-3 control-label">Confirmar Contraseña</label>
                              <input  id="password-confirm" type="password" class="form-control col-md-12" name="password_confirmation"  placeholder="Confirmar Contraseña" required="required" data-validation-required-message="Confirma tu Contraseña">
                              <p class="help-block text-danger"></p>
                      </div>
                  </div>
                   <div class="control-group margin-top-5" >
                      <div class="form-group  controls mb-0 pb-2">
                         
                          <button type="submit" class="btn btn-primary btn-xl col-md-12 text-uppercase bg-primary text-white rounded btn-outline-light no-bordes">
                              Registrate
                          </button>
                          <p class="col-md-12 col-sm-12 offset-md-4 offset-sm-2">¿Ya tienes cuenta?  <a  href="/login">
                                  Inicia Sesion.
                              </a></p>
                        </div>
                  </div>
              </form>
          </div>
        </div>
    </div>
</div>
@endsection
