@extends('layouts.master')
@section('styles')
<style type="text/css">
    body{
    	background-color: #e2e2e2;
    }
</style>
@endsection
@section('content')
<div class="container margin-top-15 margin-bot-15 col-md-7 col-sm-12" id="register-cont" >
    <div class="row">
        <div class="card  col-md-12">
            <div class="card-body text-primary">
            <h2 class="text-center text-uppercase text-secondary mb-0">Registrate</h2>
                <hr class="star-dark mb-5">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="control-group"  style="margin-bottom: 5%">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                            <label for="name"  class="col-md-6 offset-md-3 control-label">Nombre</label>   
                            <div class="col-md-12 col-sm-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre del Proyecto" required="required" data-validation-required-message="Ingresa el Nombre de tu Proyecto">
                                <p class="help-block text-danger"></p>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="control-group"  style="margin-bottom: 5%">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                            <label for="name"  class="col-md-6 offset-md-3 control-label">Equipo</label>   
                            <div class="col-md-12 col-sm-12">
                                <select id="name" type="text" class="form-control" name="equipo" value="{{ old('name') }}" required="required" data-validation-required-message="Ingresa el Nombre de tu Proyecto">
                                	<option value="" disabled selected>Selecciona tu equipo</option>
                                	<option>Prueba</option>
                                	<option>Prueba2</option>
                                </select>
                                <p class="help-block text-danger"></p>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Descripcion</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Descripcion" required="required" data-validation-required-message="Completa este campo."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                     <div class="control-group margin-top-5" >
                        <div class="form-group  controls mb-0 pb-2">
                         
                            <button type="submit" class="btn btn-primary btn-xl col-md-12 text-uppercase bg-primary text-white rounded btn-outline-light">
                                Registrar
                            </button>
                        </div>
                    </div>                 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection