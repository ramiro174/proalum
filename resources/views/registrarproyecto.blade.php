@extends('layouts.master')
@section('styles')
<style type="text/css">
body{
  background-color: #e2e2e2;
}
</style>
@endsection
@section('content')
<div class="container letras-1-rem margin-top-15 margin-bot-15 col-md-7 col-sm-12">
  <div class="row">
    <div class="card  col-md-12">
      <div class="card-body text-primary">
        <h2 class="text-center text-uppercase text-secondary mb-0">Registra tu Proyecto</h2>
        <hr class="star-dark mb-5">
        <form class="form-horizontal" method="POST" action="registrarproyecto">
          {{ csrf_field() }}
          <div class="control-group margin-bot-5">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label for="name"  class="col-md-6 offset-md-3 control-label">Nombre</label>   
              <div class="col-md-12 col-sm-12">
                <input id="name" type="text" class="form-control" name="name" placeholder="Nombre del Proyecto" required="required" data-validation-required-message="Ingresa el Nombre de tu Proyecto">
                <p class="help-block text-danger"></p>
               
              </div>
            </div>
          </div>
          <div class="control-group margin-bot-5">
            <div class="form-group  floating-label-form-group controls mb-0 pb-2">
              <label for="name"  class="col-md-6 offset-md-3 control-label">Equipo</label>   
              <div class="col-md-12 col-sm-12">
                <select id="equipo" type="text" class="form-control select-estilo" name="equipo"  required="required" data-validation-required-message="Elige un equipo">
                  <option value="" disabled selected>Selecciona tu equipo</option>
                  @foreach($equipos as $key)
                  <option value="{{$key->id}}" >{{$key->nombreequipo}}</option>
                  @endforeach
                </select>
                <p class="help-block text-danger"></p>

              </div>
            </div>
          </div>
          <div class="control-group margin-bot-5">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label for="vinculo"  class="col-md-6 offset-md-3 control-label">Vinculo de Git</label>
              <div class="col-md-12 col-sm-12">
                <input id="vinculo" type="text" class="form-control" name="vinculo" placeholder="Vinculo de Proyecto en Git">
                <p class="help-block text-danger"></p>      
              </div>
            </div>
          </div>
          <div class="control-group margin-bot-5">
            
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Descripcion</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripcion" required="required" data-validation-required-message="Completa este campo."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group margin-top-5" >
            <div class="form-group  controls mb-0 pb-2">

              <button type="submit" class="btn btn-primary btn-xl col-md-12 text-uppercase bg-primary text-white rounded btn-outline-light border-0">
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