@extends('layouts.master')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="css/tagsinput.css">
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/tagsinput.js"></script>
    <script type="text/javascript" src="js/typeahead.js"></script>
    <style type="text/css">
        body{
            background-color: #e2e2e2;
        }
    </style>
@endsection
@section('content')
    <div class="container margin-top-15 margin-bot-15 col-md-7 col-sm-12" id="register-cont" >
    <div class="row">
      <div class="card  col-md-12">
          <div class="card-body text-primary">
            <h2 class="text-center text-uppercase text-secondary mb-0">Registra tu Equipo</h2>
              <hr class="star-dark mb-5">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}
                  <div class="control-group"  style="margin-bottom: 5%">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                          <label for="name"  class="col-md-6 offset-md-3 control-label">Nombre del Equipo</label>   
                          <div class="col-md-12 col-sm-12">
                              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre del Equipo" required="required" data-validation-required-message="Completa este Campo">
                              <p class="help-block text-danger"></p>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="control-group" >
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                          <label for="email" class="col-md-12 offset-md-3 control-label">Miembros del Equipo</label>
                             <input id="miembros"  type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Miembros del Equipo" required="required" data-validation-required-message="Completa este Campo" data-role="tagsinput">
                              <p class="help-block text-danger"></p>
                      </div>
                  </div>
                   <div class="control-group margin-top-5" >
                      <div class="form-group  controls mb-0 pb-2">
                          <button type="submit" class="btn btn-primary btn-xl col-md-12 text-uppercase bg-primary text-white rounded btn-outline-light">
                              Registrar
                          </button>
                        </div>
                  </div>                 
              </form>
          </div>
        </div>
    </div>
</div>
@endsection
@section('scriptsAdicionales')

    <script type="text/javascript">
		$(document).ready(function () {
			

            
			var engine = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('email'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
             prefetch: {
                    url: "/llenar",
                    filter: function(list) {
                    return $.map(list, function(nombre) {                     
                    return { email: nombre.email}; });
                    }
                }
             });
            engine.initialize();
                console.log(engine);
           
            $('input#miembros').tagsinput({
              typeaheadjs: {
                name: 'nombre',
                displayKey: 'email',
                valueKey: 'email',
                source: engine.ttAdapter()
              }
            });

		});
    </script>
@endsection
