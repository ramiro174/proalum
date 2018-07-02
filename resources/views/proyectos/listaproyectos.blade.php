@extends('layouts.master')
@section('styles')
<style type="text/css"> body{ background-color: #e2e2e2;}</style>
@endsection
@section('content')
<div class="container margin-top-15 margin-bot-5">
	<div class="card">
    <div class="card-header"><a class="heredar-color" href="/profile"><img class="col-1 float-left" src="img/profile.png"><h1 class="text-uppercase">{{Auth::user()->name}}</h1></a> 
    </div>
		<div class="card-body">
			@foreach($proyectos as $key)
    <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{$key->nombre_proyecto}}</h3>
          <p>{{$key->descripcion}}</p>
          <a class="btn btn-primary" href="#">Ver Proyecto</a>
        </div>
      </div>
      @endforeach
      
     <br>
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Proyecto 3</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
          <a class="btn btn-primary" href="#">Ver Proyecto</a>
        </div>
      </div>
<br>
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Proyecto 3</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
          <a class="btn btn-primary" href="#">Ver Proyecto</a>
        </div>
      </div>
		</div>
	</div>
 </div>
  

@endsection