@extends('layouts.master')
@section('content')
<!-- Header -->
<header class="masthead bg-primary text-white text-center">
  <div class="container">
    @if(@Auth::user()->imagen==null)
    <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
    @else
    <img  class="img-bienvenido rounded-circle img-thumbnail img-fluid mb-5 d-block mx-auto" src="<?php echo asset("storage/usuarios/perfil/imagenes")?>/{{@Auth::user()->imagen}}" alt="" >
    @endif
    <h1 class="text-uppercase mb-0">Encuentra aqui tu proyecto creado por la carrera de TICS</h1>
    <hr class="star-light">
    <a class="heredar-color" href="/projectbrowser"><h2 class="letras-blancas text-center text-uppercase  mb-0">Todos los Proyectos</h2></a> 
  </div>
</header>
<!-- Portfolio Grid Section -->
<section class="portfolio" id="portfolio">
  <div class="container">
    <h2 class="text-center text-uppercase text-secondary mb-0">Alguno de nuestros proyectos</h2>
    <hr class="star-dark mb-5">
    <div class="row">
      @foreach($proyectos as $key)
      <div class="col-md-6 col-lg-4">
        <a class="portfolio-item d-block mx-auto proyecto-boton" accesskey="{{$key->nombre_proyecto}}" href="#portfolio-modal-1">
          <input type="hidden" id="id-proyecto" value="{{$key->id}}" name="">
          <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
              <i class="fa fa-search-plus fa-3x"></i>
            </div>
          </div>
          <input type="hidden" id="proyecto-nombre-input" name="" value="{{$key->descripcion}}">
          @if($key->imagen != null)
          <img class="img-fluid proyecto-img-bienvenidos" src="<?php echo asset("storage/proyectos")?>/{{$key->imagen}}" alt="">
          @else
          <img class="img-fluid proyecto-img-bienvenidos" src="http://www.sefincoahuila.gob.mx/sistemas/entidades_paraestatales/documentos/saep_identificacion_general/1070216-LOGO%20UTT.jpg" alt="">
          @endif
        </a>
      </div>
      @endforeach
      
      
    </div>
     <a class="heredar-color" href="/projectbrowser"><h2 class="text-center text-uppercase text-secondary mb-0">Todos los Proyectos</h2></a> 
  </div>
</section>
<!-- About Section -->
<section class="bg-primary text-white mb-0" id="about">
  <div class="container">
    <h2 class="text-center text-uppercase text-white">acerca</h2>
    <hr class="star-light mb-5">
    <div class="row">
      <div class="col-lg-4 ml-auto">
        <p class="lead">proyecto creado para difundir el conocimiento de la carrera de tics</p>
      </div>
      <div class="col-lg-4 mr-auto">
        <p class="lead">Cualquier empresa puede ver lo que se raliza en la utt</p>
      </div>
    </div>
    <div class="text-center mt-4">
      <a class="btn btn-xl btn-outline-light" href="#">
        <i class="fa fa-download mr-2"></i>
        Download Now!
      </a>
    </div>
  </div>
</section>
<!-- Contact Section -->
<section id="contact">
  <div class="container">
    <h2 class="text-center text-uppercase text-secondary mb-0">Contact Me</h2>
    <hr class="star-dark mb-5">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
        <form name="sentMessage" id="contactForm" novalidate="novalidate">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Name</label>
              <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Email Address</label>
              <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Phone Number</label>
              <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Message</label>
              <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->

<div class="copyright py-4 text-center text-white">
  <div class="container">
    <small>Copyright &copy; Your Website 2018</small>
  </div>
</div>
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
  <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
    <i class="fa fa-chevron-up"></i>
  </a>
</div>
<!-- Portfolio Modals -->
<!-- Portfolio Modal 1 -->
<div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
  <div class="portfolio-modal-dialog bg-white">
    <a class="close-button d-none d-md-block portfolio-modal-dismiss" data-dismiss="modal" href="#">
      <i class="fa fa-3x fa-times"></i>
    </a>
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-secondary text-uppercase mb-0" id="nombre-proyecto"></h2>
          <hr class="star-dark mb-5">
          <img class="img-fluid mb-5" id="imagen-proyecto"alt="">
          <h4 id="descripcion-proyecto"></h4>
          <a class="btn btn-primary btn-lg rounded-pill" id="boton-ver" d>
            <i class="fa fa-close"></i>
            Ver Proyecto</a>
        </div>
      </div>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('.proyecto-boton').click(function(){
        $nombre = $(this).attr('accesskey');
        console.log($nombre);
        $descripcion = $(this).children('input#proyecto-nombre-input').val();
        $imagen = $(this).children('img').attr('src');
        $('#nombre-proyecto').text($nombre);
        $('#descripcion-proyecto').text($descripcion);
        $('#imagen-proyecto').attr('src',$imagen);
        $('#boton-ver').attr('href',/perfilproyecto/+$(this).children('input#id-proyecto').val());
        $('#portfolio-modal-1').modal('show');


    });
  });
</script>
@endsection
