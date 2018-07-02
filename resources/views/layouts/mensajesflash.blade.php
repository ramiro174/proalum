@section('contentflash')

<div class="margin-top-15">
	@if (Auth::user()->name == 'raul')
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $mensaje }}</strong>
        {{Session::forget('mensaje')}}
</div>
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


@endsection