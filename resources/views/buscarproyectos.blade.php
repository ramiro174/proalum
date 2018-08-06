@extends('layouts.master')

@section('styles')
<style type="text/css">
  body
  {
    background-color: #e2e2e2;

  }
</style>
@endsection

@section('content')
<div class="container margin-top-15 margin-bot-15">
<div class="card">
    <div class="card-body ">
      <div class="row">

        
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          {{csrf_field()}}
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              @foreach($masvotos as $key)
              @if($key->imagen != null)
              <div class="carousel-item proyecto-img-carrousel">
                <a href="/perfilproyecto/{{$key->id}}">
                <img class="d-block col-12" src="<?php echo asset("storage/proyectos")?>/{{$key->imagen}}" alt="First slide"></a>
              </div>
              @else
              <div class="carousel-item proyecto-img-carrousel">
                <img class="d-block col-12" src="http://www.sefincoahuila.gob.mx/sistemas/entidades_paraestatales/documentos/saep_identificacion_general/1070216-LOGO%20UTT.jpg" alt="Second slide">
              </div>
              @endif
              @endforeach
              <div class="carousel-item active proyecto-img-carrousel">
                <img class="d-block col-12" src="http://www.sefincoahuila.gob.mx/sistemas/entidades_paraestatales/documentos/saep_identificacion_general/1070216-LOGO%20UTT.jpg" alt="Second slide">
              </div>
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
            <input type="hidden" name="data-click" >
            @foreach($obj as $key)
           
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                @if($key->imagen != null)
                <a href="/perfilproyecto/{{$key->id}}"><img class="col-12 card-img-top proyecto-img-thumbnail" src="<?php echo asset("storage/proyectos")?>/{{$key->imagen}}" alt=""></a>
                
                @else
                <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                @endif
                <div class="card-body">
                  <h4 class="card-title">
                    <a class="heredar-color" href="/perfilproyecto/{{$key->id}}">{{$key->nombre_proyecto}}</a>
                  </h4>
                  <a class="heredar-color" href="/teamprofile/{{$key->equipos->id}}"><button  name="equipo" id="equipo" class="btn-invisible"><h5>{{$key->equipos->nombreequipo}}</h5></button></a>
                  <div class="esconder-texto-lista">
                     <p class="card-text">{{$key->descripcion}}</p>
                  </div> 
                 
                </div>
                <div class="card-footer">
                  <button accesskey="{{$key->id}}" class="boton-like btn border-0 btn-sm float-right"><i class="fa fa-sm fa-thumbs-up"></i>@if($key->votos != null)
                  <small class="offset-1"><strong>{{$key->votos}}</strong></small>
                  @endif</button>
                </div>
              </div>
            </div>
            
            @endforeach

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a class="heredar-color" href="/perfilproyecto">Proyecto 1</a>
                  </h4>
                 <a class="heredar-color" href="#"><h5>Equipo 1</h5></a> 
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a class="heredar-color" href="/perfilproyecto">Proyecto 2</a>
                  </h4>
                <a class="heredar-color" href="#"><h5>Equipo 2</h5></a>  
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a class="heredar-color" href="/perfilproyecto">Proyecto 3</a>
                  </h4>
                <a class="heredar-color" href="#"><h5>Equipo 3</h5></a>  
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a class="heredar-color" href="/perfilproyecto">Proyecto 4</a>
                  </h4>
                <a class="heredar-color" href="#"><h5>Equipo 4</h5></a>  
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a class="heredar-color" href="/perfilproyecto">Proyecto 5</a>
                  </h4>
                 <a class="heredar-color" href="#"><h5>Equipo 5</h5></a> 
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a class="heredar-color" href="/perfilproyecto">Proyecto 6</a>
                  </h4>
                  <a class="heredar-color" href="#"><h5>Equipo 6</h5></a>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

          </div>
         

        </div>
        
        <div class="col-lg-3">

          <h1 class="my-4">Proyectos TSU</h1>
          <div class="">
            <a href="{{url('/buscador')}}" class="btn btn-primary">Buscar Proyectos<i class="fa fa-lg fa-search offset-1" style="padding-right: .2rem;"></i></a>
          </div>

        </div>
      </div>
      <div class="pagination">
      	
      </div>
      </div>
      </div>
    </div>

@endsection
@section('scriptsAdicionales')
  <script type="text/javascript">
    $(document).ready(function(){
      $('button #equipo').click(function(){

      });
      $('.boton-like').click(function(){
        $data={
          "idproyecto":$(this).attr('accesskey'),
          "_token":$("input[name*='_token']").val(),
        };
        $.ajax({
              url     : "/botonlike",
              type    : "post",
              dataType: "JSON",
              data    : $data,
              success : function($r){}
            });
        setTimeout(location.reload.bind(location), 1000);
      })
    });
  </script>
@endsection