@extends('layouts.master')

@section('styles')
@endsection

@section('content')
<div class="container" style="margin-top: 15%">
        <h2 class="text-center text-uppercase text-secondary mb-0">Registrar Equipo</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
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
                            <select  class="form-control" id="email">
                                <optgroup>
                                  <option style="font-size: 140%;color: #495057;" value="nada">Miembros del Equipo</option>
                                <option value="volvo">Volvo</option>
                                <option value="volvo">Volvo</option>
                                <option value="volvo">Volvo</option>  
                                </optgroup>                           	
                            </select>
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