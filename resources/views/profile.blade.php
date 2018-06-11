@extends('layouts.master')

@section('styles')


 
<link rel="stylesheet" type="text/css" href="css/profile.css"/>


@endsection

@section('content')

<div class="container col-12 margin-top-15 margin-bot-5"  >
    <div class="row">
      <div class="offset-lg-2 col-lg-8 col-sm-8 main-section text-center">
          <div class="row">
              <div class="col-lg-12 col-sm-12  profile-header"></div>
          </div>
          <div class="row user-detail">
              <div class="col-lg-12 col-sm-12 ">
                  <img src="img/profile.png" class="rounded-circle img-thumbnail">
                  <h5>
                    {{@Auth::user()->name}}
                  </h5>
                  

                  <hr>
                  <a href="#" class="btn btn-success btn-lg bg-primary text-white rounded btn-outline-light col-md-6 col-sm-12  no-bordes" style="font-size: 100%">Proyectos en los que participo el Alumno</a>
                  

                  <hr>
                  <span>Biografia del alumno </span>
              </div>
          </div>
          <div class="row user-social-detail">
              <div class="col-lg-6 col-sm-8  offset-lg-3">
                  <a href="/registerproject" class="col-12 btn btn-success btn-lg bg-success no-bordes text-white rounded btn-outline-light" style="border-color: #28a745">Registrar un Proyecto</a> 
                  <hr>
                  <a href="/registerteam" class="col-12 btn btn-success btn-lg bg-primary no-bordes text-white rounded btn-outline-light" style="border-color: #18bc9c">Registrar un Equipo</a>
                  <hr>
                  <a href="/listaequipos" class="col-12 btn btn-success btn-lg bg-success no-bordes text-white rounded btn-outline-light" style="border-color: #18bc9c">Mis Equipos</a>
                  
                  <p>Aqui pueden ir opciones a discutir</p>
              </div>
          </div>
      </div>
    </div>
  </div>

@endsection