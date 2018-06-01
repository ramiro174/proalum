@extends('layouts.master')

@section('styles')
 <style type="text/css">
     #log{
        margin-top: 10%;
        margin-bottom: 15%;
        align-content: center;
        font-size: 140%;
        color: #495057;
     }
     body{
        background-color: #b9c0c7;

     }
 </style>
@endsection

@section('content')
<div class="container col-md-4 col-sm-12" id="log">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }} ">
                            <label class="col-md-12 offset-md-3 control-label">Correo Electronico</label>

                            <div class="col-md-12 col-sm-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 offset-md-4 control-label">Contraseña</label>

                            <div class="col-md-12 col-sm-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-xl col-md-12 text-uppercase bg-primary text-white rounded btn-outline-light">
                                    Ingresar
                                </button>

                                    <p>¿No tienes cuenta?  <a  href="#">
                                    Registrate aqui.
                                </a></p>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
