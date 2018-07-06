@extends('layouts.master')
@section('styles')
<style type="text/css"> body{ background-color: #e2e2e2;}</style>
@endsection
@section('content')

<div class="container letras-1-rem margin-top-15 margin-bot-15 col-md-7 col-sm-12 " >
  <div class="row">
  	<div class="card col-12">
  		<div class="card-body">
        @foreach($equipos as $key)
  			<div class="card  col-md-12 no-bordes">
      <div class="card-body">
     <div class="card">
  <h5 class="card-header">{{$key->nombreequipo}}</h5>
  <div class="card-body">
  <h5 class="card-title">Miembros del Equipo</h5>
  <ul>
    @foreach($key->userMiembro as $key2)
    <li>{{$key2->name}}</li>
    
    @endforeach
  </ul>
  <a href="/teamprofile/{{$key->id}}" class="btn btn-primary float-right">Ver Equipo</a>
  </div>
</div>
      </div>
    </div>
     @endforeach
    <div class="card  col-md-12 no-bordes">
      <div class="card-body">
      <div class="card">
  <h5 class="card-header">Equipo 2 <i class="offset-md-3 fa fa-key float-right"></i></h5>
  <div class="card-body">
  <h5 class="card-title">Miembros del Equipo</h5>
  <ul>
    <li>Alumno</li>
    <li>Alumno</li>
    <li>Alumno</li>
  </ul>
  <a href="/teamprofile" class="btn btn-primary float-right">Ver Equipo</a>
  </div>
</div>
      </div>
    </div>
    <div class="card  col-md-12 no-bordes">
      <div class="card-body">
      <div class="card">
  <h5 class="card-header">Equipo 3</h5>
  <div class="card-body">
  <h5 class="card-title">Miembros del Equipo</h5>
  <ul>
    <li>Alumno</li>
    <li>Alumno</li>
    <li>Alumno</li>
  </ul>
  <a href="/teamprofile" class="btn btn-primary float-right">Ver Equipo</a>
  </div>
</div>
      </div>
    </div>
  		</div>
  	</div>
    
  </div>
</div>
@endsection
@section('scriptsAdicionales')
@endsection