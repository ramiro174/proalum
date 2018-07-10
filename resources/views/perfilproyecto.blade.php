@extends('layouts.master')

@section('styles')
@endsection

@section('content')
<div class="container margin-bot-15 margin-top-15" >

  <!-- Portfolio Item Heading -->
  <h1 class="my-4">{{$proyecto->nombre_proyecto}}
    <small><a href="/teamprofile/{{$equipo->id}}">{{$equipo->nombreequipo}}</a> </small>
    <a data-toggle="modal" data-target="#editar" class="btn btn-sm btn-warning offset-7 no-bordes" href="">Editar<i class="fa fa-fw fa-pencil"></i></a>
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-4">
      <h3 class="my-3">Descripcion del Proyecto</h3>
      <p>{{$proyecto->descripcion}}</p>
      
    </div>
    
  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <h3 class="my-4">Mas del Equipo 1</h3>

  <div class="row">
    <div class="card col-md-3 col-sm-6 mb-4  img-size-small">                   
     
      <img class="card-img img-fluid img-size-small" src="img/diagramas.png" alt="">
      
      <div class="card-img-overlay transparente" >
        <a class="card-title heredar-color" href=""><h5>Proyecto</h5><br>
          <p class="card-text ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

        </div>         
      </div>
      
      <div class="card col-md-3 col-sm-6 mb-4 img-size-small">                   
       
        <img class="card-img img-fluid img-size-small" src="img/diagramas.png" alt="">
        
        <div class="card-img-overlay transparente">
          <a class="card-title heredar-color" href=""><h5>Proyecto</h5><br>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

          </div>         
        </div>
        <div class="card col-md-3 col-sm-6 mb-4  img-size-small">                   
         
          <img class="card-img img-fluid img-size-small" src="img/diagramas.png" alt="">
          
          <div class="card-img-overlay transparente">
            <a class="card-title heredar-color" href=""><h5>Proyecto</h5><br>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

            </div>         
          </div>
          <div class="card col-md-3 col-sm-6 mb-4 img-size-small">                   
           
            <img class="card-img img-fluid img-size-small img-small" src="img/palmas.jpg" alt="">
            
            <div class="card-img-overlay transparente">
              <a class="card-title heredar-color" href=""><h5>Proyecto</h5><br>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio.</p></a>

              </div>         
            </div>
          </div>
        </div>
        <!--Modal -->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body">
                <div class="card  col-md-12">
                  <div class="card-body text-primary">
                    

                    <form class="form-horizontal" method="POST" action="">
                      {{ csrf_field() }}
                      <div class="control-group">
                        <div class="form-group floating-label-form-group">
                          <label for="name"  class="control-label">Nombre del Proyecto</label>   
                          <div class="col-md-12 col-sm-12">
                            <input id="name" type="text" class="form-control" name="name"  placeholder="Nuevo Nombre" >
                            <p class="help-block text-danger"></p>
                            @if ($errors->has('name'))
                            <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                          <label>Descripcion</label>
                          <textarea class="form-control" id="message" rows="3" placeholder="Descripcion" ></textarea>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                          <label>Detalles</label>
                          <textarea class="form-control" id="message" rows="3" placeholder="Detalles" ></textarea>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer align-content-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary btn-ok">Aceptar</button>
              </div>
            </div>
          </div>

        </div>  
        @endsection