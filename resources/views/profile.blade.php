@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="css/profile.css"/>
@endsection
@section('content')
<div class="container col-12 col-md-12 col-sm-12 col-lg-12  margin-top-15 margin-bot-5">
  <div class="row">
    <div class="offset-lg-2 col-lg-8 col-sm-8 main-section  offset-sm-2  text-center">
      <div class="row">
                  @if(Session::has('mensaje'))
<p class="col-12 alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('mensaje') }}<button type="button" class="close" data-dismiss="alert">×</button> </p>
            {{Session::forget('mensaje')}}
@endif
@if(Session::has('alerta'))
<p class="col-12 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('alerta') }}<button type="button" class="close" data-dismiss="alert">×</button> </p>
            {{Session::forget('alerta')}}
@endif
         
 <!--           @if (Session::has('mensaje'))
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
        @if(@Auth::user()->imagen==null)
        <img src="img/profile.png" class="rounded-circle img-thumbnail img-estilo-prof ">
        @else
        <!-- <img src="{{ asset('public/images/' . @Auth::user()->imagen) }}"" class="rounded-circle img-thumbnail img-estilo-prof ">-->
        <img src="<?php echo asset("storage/usuarios/perfil/imagenes")?>/{{@Auth::user()->imagen}}"
        class="rounded-circle img-thumbnail img-estilo-prof ">
      @endif
        <div class="rounded-circle img-thumbnail sobrecapa-prof"><div class="boton-trsn align-self-center">
          <button data-toggle="modal" data-target="#modal-imagen" class="no-bordes btn btn-primary btn-sm align-self-auto" href="">Imagen<i class="fa fa-fw fa-picture-o"></i></button><br><br><button data-toggle="modal" data-target="#modal-curriculo" class="no-bordes btn btn-primary btn-sm align-self-auto" href="">Curriculo<i class="fa fa-fw fa-file-text-o"></i></button></div></div>
      </div>
    </div>
    <div class="col-md-12">
      <h5 class="text-uppercase">
        {{@Auth::user()->name}}
      </h5>
      <hr>
      <a href="/listaproyectosid/{{Auth::user()->id}}" class="btn btn-success btn-lg bg-success text-white rounded btn-outline-light col-md-12 col-lg-6 col-sm-12  no-bordes" style="font-size: 100%">Mis Proyectos</a>
      <hr>
      
    </div>
  </div>
</div>
<div class="row user-social-detail">
  <div class="col-lg-6 col-sm-12  offset-lg-3">
    <a href="/registerteam" class="col-12 col-sm-12 col-lg-12 btn btn-success btn-lg bg-primary no-bordes text-white rounded btn-outline-light" >Registrar un Equipo</a>
   
    <hr>
     <a href="/registerproject" class="col-12 btn btn-success btn-lg bg-success no-bordes text-white rounded btn-outline-light" >Registrar un Proyecto</a>
    <hr>
    <a href="/listaequipos" class="col-12 btn btn-success btn-lg bg-primary no-bordes text-white rounded btn-outline-light" >Mis Equipos</a>
    
    
  </div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal-imagen">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <form method="POST" action="{{url('subirimagen')}}" files="true" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
         
          <input required="" class="btn col-sm-6 col-lg-12 col-md-12" accept="image/*" type="file" id="imagen"
          name="imagen" >
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary col-6 float-left" type="submit">Subir Imagen</button>
          <button class="btn btn-danger col-6" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-curriculo">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      @if(Auth::user()->curriculo == null)
      <form method="POST" id="form-modal" action="{{url('subircurriculo')}}" files="true" enctype="multipart/form-data">
        
          @endif
        {{ csrf_field() }}
        <div class="modal-body">
         @if(Auth::user()->curriculo == null)
          <input required="" class="btn col-sm-6 col-lg-12 col-md-12" accept="file/*" type="file" 
          id="curriculo" name="curriculo" >
          @endif
        </div>
        <div class="modal-footer">
          @if(Auth::user()->curriculo == null)
          <button class="btn btn-primary col-4 " style="margin-left: .1rem" type="submit">Subir Curriculo</button>
          @else
          <button class="btn btn-danger col-4 " id="borrar-curriculo" >Borrar Curriculo</button>
          <button class="btn btn-warning col-4 " id="cambiar-modal" >Cambiar Curriculo</button>
          @endif
          <button class="btn  col-4" data-dismiss="modal">Cancelar</button>
        </div>
        @if(Auth::user()->curriculo == null)
      </form>
      @endif
    </div>
  </div>
</div>
<div class="modal fade" id="modal-cambiar">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <form method="POST" action="{{url('subircurriculo')}}" files="true" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
         
          <input required="" class="btn col-sm-6 col-lg-12 col-md-12" accept="file/*" type="file" 
          id="curriculo" name="curriculo" >
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary col-6 float-left" type="submit">Subir Curriculo</button>
          <button class="btn btn-danger col-6" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
@section('scriptsAdicionales')
<script type="text/javascript">
  $(document).ready(function(){

    $('button#borrar-curriculo').click(function(){
            $('input#curriculo').attr('required',"false");
            $data = { 
              "_token":$("input[name*='_token']").val(),
            }

            $.ajax({
              url     : "/borrarcurriculo",
              type    : "post",
              dataType: "JSON",
              data    : $data,
              success : function($r){location.reload();}
            });
            setTimeout(location.reload.bind(location), 500);
    });
    $('button#cambiar-modal').click(function(){
        $('#modal-curriculo').modal('hide');
        $('#modal-cambiar').modal('show');
    });

  });
</script>
@endsection