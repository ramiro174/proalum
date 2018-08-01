@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/profile.css"/>
@endsection
@section('content')
<div class="container col-12 col-md-12 col-sm-12 col-lg-12  margin-top-15 margin-bot-5">
  <div class="row">
    <div class="offset-lg-2 col-lg-8 col-sm-8 main-section  offset-sm-2  text-center">
      <div class="row">
        <!--          @if(Session::has('mensaje'))
<p class="col-12 alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('mensaje') }}<button type="button" class="close" data-dismiss="alert">×</button> </p>
            {{Session::forget('mensaje')}}
@endif
         
            @if (Session::has('mensaje'))
<div class="alert alert-success alert-block margin-top-15">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ Session::get('mensaje')}}</strong>
        {{Session::forget('mensaje')}}
        <h1>Prueba</h1>
</div>
@endif-->


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
<div class="modal fade" id="modal-imagen">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <form method="POST" action="{{url('subirimagenid/$user->id')}}" files="true" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
         
          <input required="" class="btn col-sm-6 col-lg-12 col-md-12" accept="image/*" type="file" id="imagen" 
          name="imagen" >
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary col-6 float-left" type="submit">Cambiar</button>
          <button class="btn btn-danger col-6" data-dismiss="modal">Cancelar</button>
        </div> 
      </form>
      
      
    </div>
  </div>
</div>

@endsection