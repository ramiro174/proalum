@section('contentflash')
<div class="margin-top-15">
	<h1>PRUEBA</h1>
</div>
<div class="margin-top-15">
	@if (Session::has('mensaje'))
<div class="alert alert-success alert-block margin-top-15">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get('mensaje')}}</strong>
        {{Session::forget('mensaje')}}
</div>
@endif
 @if(Session::has('mensaje'))
<p class="col-12 alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('mensaje') }}<button type="button" class="close" data-dismiss="alert">×</button> </p>
            {{Session::forget('mensaje')}}
@endif
@if ($mensaje = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $mensaje }}</strong>
        {{Session::forget('mensaje')}}
</div>
@endif

@if ($mensaje = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $mensaje }}</strong>
	{{Session::forget('mensaje')}}
</div>
@endif

@if ($mensaje = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $mensaje }}</strong>
	{{Session::forget('mensaje')}}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
	{{Session::forget('mensaje')}}
</div>
@endif
</div>


@show