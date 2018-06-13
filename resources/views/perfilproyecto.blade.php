@extends('layouts.master')

@section('styles')
@endsection

@section('content')
<div class="container margin-bot-15 margin-top-15" >

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Proyecto 1
        <small><a href="/teamprofile">Equipo 1</a> </small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="http://placehold.it/750x500" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Descripcion del Proyecto</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim. <a class="btn btn-sm btn-warning" href=""><i class="fa fa-fw fa-pencil"></i></a></p>
          <h3 class="my-3">Detalles del Proyecto</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.  <a class="btn btn-sm btn-warning" href=""><i class="fa fa-fw fa-pencil"></i></a></p>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Mas del Equipo 1</h3>

      <div class="row">
        <div class="card col-md-3 col-sm-6 mb-4 no-bordes">                   
         
            <img class="card-img img-fluid" src="http://placehold.it/500x300" alt="">
     
          <div class="card-img-overlay">
            <a class="card-title" href=""><h5>Proyecto</h5><br>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

          </div>         
        </div>
        
      <div class="card col-md-3 col-sm-6 mb-4 no-bordes">                   
         
            <img class="card-img img-fluid" src="http://placehold.it/500x300" alt="">
     
          <div class="card-img-overlay">
            <a class="card-title" href=""><h5>Proyecto</h5><br>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

          </div>         
        </div>
          <div class="card col-md-3 col-sm-6 mb-4 no-bordes">                   
         
            <img class="card-img img-fluid" src="http://placehold.it/500x300" alt="">
     
          <div class="card-img-overlay">
            <a class="card-title" href=""><h5>Proyecto</h5><br>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

          </div>         
        </div>
        <div class="card col-md-3 col-sm-6 mb-4 no-bordes">                   
         
            <img class="card-img img-fluid" src="http://placehold.it/500x300" alt="">
     
          <div class="card-img-overlay">
            <a class="card-title" href=""><h5>Proyecto</h5><br>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

          </div>         
        </div>
      </div>

      <!-- /.row -->

    </div>
@endsection