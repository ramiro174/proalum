@extends('layouts.master')

@section('styles')
 <style type="text/css">
   
   body{
    background-color: #e2e2e2;
  }
 </style>
@endsection

@section('content')
<div class="container letras-1-rem margin-top-15 margin-bot-15 col-md-4 col-sm-12">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="card">
        <div class="panel-heading"></div>

        <div class="card-body text-primary">
          <h2 class="text-center text-uppercase text-secondary mb-0">Inicia Sesion</h2>
        <hr class="star-dark mb-5">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
          <div class="control-group"  style="margin-bottom: 5%">
            <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }} floating-label-form-group controls mb-0 pb-2 ">
              <label class="col-md-12 offset-md-3 control-label">Correo Electronico</label>

              <div class="col-md-12 col-sm-12">
                <input id="email" type="email" class="form-control"  name="email" value="{{ old('email') }}" placeholder="Correo Electronico" required="required" data-validation-required-message="Ingresa tu Correo Electronico">
                <p class="help-block text-danger"></p>
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>
            
          <div class="control-group">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} floating-label-form-group ">
              <label for="password" class="col-md-12 offset-md-3 control-label">Contraseña</label>

              <div class="col-md-12 col-sm-12">
                <input id="password"   type="password" class="form-control" name="password" placeholder="Contraseña" required="required" data-validation-required-message="Ingresa tu Contraseña">
                <p class="help-block text-danger"></p>
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>

            

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-xl col-md-12 text-uppercase bg-primary text-white rounded btn-outline-light">
                  Ingresar
                </button>

                  <p class="col-md-12 offset-md-1">¿No tienes cuenta?  <a  href="/register">
                  Registrate.
                </a></p>
                 
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
