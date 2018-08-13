@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/profile.css"/>
@endsection
@section('content')
<div class="container col-12 col-md-12 col-sm-12 col-lg-12  margin-top-15 margin-bot-5">
  <div class="row">
    <div class="offset-lg-2 col-lg-8 col-sm-8 main-section  offset-sm-2  text-center">
      <div class="row">


<div class="col-lg-12 col-sm-12  profile-header">
  
</div>
</div>
<div class="row user-detail">
  <div class="col-lg-12 col-sm-12">
    <div class="col-md-12 " style="height: 16rem ">
      <div class="img-contenedor">
        @if($user->imagen==null)
        <img src="/img/profile.png" class="rounded-circle img-thumbnail img-estilo-prof ">
        @else
        <!-- <img src="{{ asset('public/images/' . @Auth::user()->imagen) }}"" class="rounded-circle img-thumbnail img-estilo-prof ">-->
        <img src="<?php echo asset("/storage/usuarios/perfil/imagenes")?>/{{$user->imagen}}" 
        class="rounded-circle img-thumbnail img-estilo-prof ">

        
        @endif
        @if(Auth::check())
        @if($user->curriculo != null)
        <div class="rounded-circle img-thumbnail sobrecapa-prof">
          <div class="boton-trsn align-self-center">
          
          <button data-toggle="modal" data-target="#modal-curriculo" class="no-bordes btn btn-primary btn-sm align-self-auto" >Curriculo<i class="fa fa-fw fa-file-text-o"></i></button>
        </div>
      </div>
      @endif
      @endif
      </div>
    </div>
    <div class="col-md-12">
      <h5 class="text-uppercase">
        {{$user->name}}
      </h5>
      <hr>
      <a href="/listaproyectosid/{{$user->id}}" class="btn btn-success btn-lg bg-primary text-white rounded btn-outline-light col-md-12 col-lg-6 col-sm-12  no-bordes" style="font-size: 100%">Proyectos en los que participo el Alumno</a>
      <hr>
      <a href="/listaequiposid/{{$user->id}}" class="btn btn-success btn-lg bg-success no-bordes text-white rounded btn-outline-light col-md-12 col-lg-6 col-sm-12" >Equipos del Alumno</a>
    </div>
  </div>
</div>
<div class="row user-social-detail">
  <div class="col-lg-6 col-sm-12  offset-lg-3">
    
    
    <br>
    
  </div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal-curriculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header fuente">
        ¿Descargar Curriculum?
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="<?php echo asset("/storage/usuarios/curriculos")?>/{{$user->curriculo}}" id="descarga-curriculum" download="curriculo_{{$user->name}}" class="btn btn-primary btn-bs">Descargar <i class="fa fa-lg fa-download"></i></a>
      </div>      
    </div>
  </div>
</div>

@endsection
