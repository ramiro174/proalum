@extends('layouts.master')
@section('styles')
<style type="text/css"> body{ background-color: #e2e2e2;}</style>
@endsection
@section('content')
<div class="container margin-top-15 margin-bot-5">
	<div class="card">

    <div class="card-header">
      <a class="heredar-color" href="/profile">
        @if($alumno->imagen != null)
        <img class="col-1 float-left usuario-img-lista-proyectos rounded" src="<?php echo asset("storage/usuarios/perfil/imagenes")?>/{{$alumno->imagen}}">
        @else
        <img class="col-1 float-left usuario-img-lista-proyectos rounded" src="/img/profile.png">
        @endif
        
      <h1 class="text-uppercase">{{$alumno->name}}</h1></a> 
    </div>
    <div class="card-body">
     @foreach($proyectos as $key)
     <div class="row margin-bot-5">
      <div class="col-md-7">
        @if($key->imagen != null)
        <a href="/perfilproyecto/{{$key->id}}">
          <img class="img-fluid rounded mb-3 mb-md-0 proyecto-img-lista-proyectos" src="<?php echo asset("storage/proyectos")?>/{{$key->imagen}}" alt="">
        </a>
        @else
        <a href="/perfilproyecto/{{$key->id}}">
          <img class="img-fluid rounded mb-3 mb-md-0 " src="http://placehold.it/700x300" alt="">
        </a>
        @endif
        
      </div>
      <div class="col-md-5">
        <h3>{{$key->nombre_proyecto}}</h3>
        <div class="esconder-texto-lista">
          <p>{{$key->descripcion}}</p>
        </div>
        
        <a class="btn btn-primary" href="/perfilproyecto/{{$key->id}}">Ver Proyecto</a>
      </div>
    </div>
    <br>
    @endforeach
    
    
    
  </div>
</div>
</div>


@endsection