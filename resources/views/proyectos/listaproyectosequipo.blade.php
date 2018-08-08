@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="container margin-top-15 margin-bot-5">
	<div class="card">
    <div class="card-header"><a class="heredar-color" href="/profile"><h1>{{$equipo->nombreequipo}}</h1></a> 
    </div>
    <div class="card-body">
     @foreach($proyectos as $key)
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            @if($key->imagen != null)
            <img class="img-fluid rounded mb-3 mb-md-0 proyecto-img-lista-proyectos" src="<?php echo asset("storage/proyectos")?>/{{$key->imagen}}" alt="">
            @else
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            @endif
            
          </a>
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
@section('scriptsAdicionales')
@endsection