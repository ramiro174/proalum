<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Repositorio de Proyectos</title>
  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- Plugin CSS -->
  <link href="/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="/css/freelancer.min.css" rel="stylesheet">
  @section('styles')

  @show
  <link href="/css/proyecto.css" rel="stylesheet">
   
</head>
<body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase col-md-12"  id="mainNav">
  <div class="container" >
    <a class="navbar-brand js-scroll-trigger" href="/">Proyectos Tics</a>
    <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
         
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Acerca de <i class="fa fa-fw fa-info-circle"></i></a>
        </li>
        
         
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="{{url('/projectbrowser')}}">Proyectos    <i class="fa fa-fw fa-pull-right fa-laptop"></i></a>
          </li>
         
         @if(Auth::check())
         
        <li class="nav-item dropdown mx-0 mx-lg-1">
    <a class="nav-link dropdown-toggle nav-link py-3 px-0 px-lg-2 rounded" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{@Auth::user()->name}}
    </a>
    <div class="dropdown-menu dropdown-submenu" aria-labelledby="navbarDropdown">
      <a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="/profile">
             Perfil <i class="fa fa-pull-right fa-fw fa-user"></i>
           </a>
           
      <a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="{{url('/logout')}}">Salir    <i class="fa fa-fw fa-pull-right fa-sign-out"></i></a>
      
    </div>
    </li>
        @else
        <li class="nav-item mx-0 mx-lg-1">
           <a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="/login">Inicia Sesion <i class="fa fa-fw fa-sign-in"></i></a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
           <a  class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="/register">Registrate <i class="fa fa-fw fa-user-plus"></i></a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
  

@if(Session::has('mensaje'))
<p class="margin-top-5 col-12 alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('mensaje') }}<button type="button" class="close" data-dismiss="alert">×</button> </p>
            {{Session::forget('mensaje')}}
@endif


@section('content')
@show
<footer class="footer text-center">
  <div class="container letras-blancas">
    <div class="row">
      <div class="col-md-12 mb-5 mb-lg-0">
        <h4 class="text-uppercase mb-4">Localizacion</h4>
        <p class="lead mb-0">Carretera Torreón  Matamoros Ejido el Águila
          <br>27400 Torreón, Coah</p>
      </div>
      
      
    </div>
  </div>
</footer>
<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Plugin JavaScript -->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Contact Form JavaScript -->
<script src="/js/jqBootstrapValidation.js"></script>
<script src="/js/contact_me.js"></script>
<!-- Custom scripts for this template -->
<script src="/js/freelancer.min.js"></script>

  
@section('scriptsAdicionales')
@show
@section('scripts')
@show




</body>
</html>
