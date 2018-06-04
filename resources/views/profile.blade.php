@extends('layouts.master')

@section('styles')


 
<link rel="stylesheet" type="text/css" href="css/profile.css"/>


@endsection

@section('content')

<div class="container col-12" style="margin-top: 10%; margin-bottom: 5%" >
    <div class="row">
      <div class="offset-lg-3 col-lg-6 col-sm-6 col-12 main-section text-center">
          <div class="row">
              <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
          </div>
          <div class="row user-detail">
              <div class="col-lg-12 col-sm-12 col-12">
                  <img src="img/profile.png" class="rounded-circle img-thumbnail">
                  <h5>
                  	{{@Auth::user()->name}}
                  </h5>
                  

                  <hr>
                  <a href="#" class="btn btn-success btn-sm bg-primary text-white rounded btn-outline-light">Proyectos en los que participo el Alumno</a>
                  

                  <hr>
                  <span>Biografia del alumno </span>
              </div>
          </div>
          <div class="row user-social-detail">
              <div class="col-lg-4 col-sm-6 col-6 offset-lg-4">
              		<a href="/registerproject" class="col-12 btn btn-success btn-sm bg-success text-white rounded btn-outline-light">Registrar un Proyecto</a> 

                  <a href="/registerteam" class="col-12 btn btn-success btn-sm bg-primary text-white rounded btn-outline-light">Registrar un Equipo</a>
                  
                  <p>Aqui pueden ir opciones a discutir</p>
              </div>
          </div>
      </div>
    </div>
  </div>

@endsection