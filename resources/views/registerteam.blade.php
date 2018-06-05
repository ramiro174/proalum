@extends('layouts.master')

@section('styles')

@endsection

@section('content')
<div class="container" style="margin-top: 15%">
        <h2 class="text-center text-uppercase text-secondary mb-0">Registrar Equipo</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
               
                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group" style="margin-bottom: 5%">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Nombre del Equipo</label>
                            <input class="form-control" id="name" type="text" placeholder="Nombre del Equipo" required="required" data-validation-required-message="Ingresa el nombre de tu Equipo">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group"  style="margin-bottom: 5%"> 
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Equipo</label>
                            <input type="text" id="autocomplete">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group"  style="margin-bottom: 5%">
                    	<div class="form-group floating-label-form-group controls mb-0 pb-2">
                    		
                    	</div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary btn-xl col-md-12 offset-md-6" id="sendMessageButton">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){

  		var states = {$alumnos}
  		 $('#autocomplete').autocomplete({
    lookup: alumnos,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Currency Name:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
    }
  });
  	});
  </script>
@endsection