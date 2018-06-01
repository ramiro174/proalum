@extends('layouts.master')
@section('styles')
<style type="text/css">
    #log{
        margin-top: 10%;
        margin-bottom: 15%;
        margin-left: 35%;
        display: inline-block;
        padding: 0;
        
        font-size: 140%;
        color: #495057;
     }

     body{
        background-color: #b9c0c7;
     }

</style>
@endsection
@section('content')
<div class="container col-md-4 col-sm-12" id="log" >
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name"  class="col-md-6 offset-md-4 control-label">Nombre</label>

                            <div class="col-md-12 col-sm-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 offset-md-3 control-label">Correo Electronico</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password"  class="col-md-12 offset-md-4 control-label">Contraseña</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"  class="col-md-12 offset-md-3 control-label">Confirmar Contraseña</label>

                            <div class="col-md-12">
                                <input  id="password-confirm" type="password" class="form-control col-md-12" name="password_confirmation" style="margin-bottom: 10%" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-xl col-md-12 text-uppercase bg-primary text-white rounded btn-outline-light">
                                    Registrate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
