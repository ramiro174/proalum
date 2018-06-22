@extends('layouts.master')
@section('styles')
<style type="text/css"> body{ background-color: #e2e2e2;}</style>
@endsection
@section('scripts')
<script type="text/javascript" src="/js/List.js"></script>
@endsection
@section('content')
<div class="content margin-bot-5 margin-top-15 ">
	<div class="card col-lg-8 offset-lg-2">
		<div class="card-body">
			<div id="users">
				
				<div class="offset-1">
					<input type="text" autofocus="" class="search no-bordes no-focus fuente margin-bot-1" placeholder="Buscar.." name="">
				<button class="sort btn btn-info btn-sm  col-lg-2 col-sm-2 col-md-2 offset-lg-1" data-sort="name">
					Acomodar
				</button>
								<hr>
				</div>
				<ul class="list">
					@foreach($obj as $key)
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h4 class="card-header name">{{$key->nombre_proyecto}}</h5>
							<div class="card-body">
								<h5>{{$key->equipos->nombreequipo}}</h5>
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>

					@endforeach
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h5 class="card-header name">C Proyecto 1</h5>
							<div class="card-body">
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h5 class="card-header name">A Proyecto 2</h5>
							<div class="card-body">
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h5 class="card-header name">D Proyecto 3</h5>
							<div class="card-body">
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h5 class="card-header name">B Proyecto 4</h5>
							<div class="card-body">
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h5 class="card-header name">J Proyecto 5</h5>
							<div class="card-body">
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h5 class="card-header name">G Proyecto 6</h5>
							<div class="card-body">
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h5 class="card-header name">F Proyecto 7</h5>
							<div class="card-body">
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>
					<li class="margin-bot-5 margin-top-5">
						<div class="card">
							<h5 class="card-header name">E Proyecto 8</h5>
							<div class="card-body">
								<a href="/perfilproyecto" class="btn btn-primary ">Ver Proyecto</a>
							</div>
						</div>
					</li>
				</ul>
				<!--<ul class="pagination"></ul>-->
			</div>
		</div>
	</div>
</div>
@endsection
@section('scriptsAdicionales')

<script type="text/javascript">
	$(document).ready(function(){
		var options = {
			valueNames: [ 'name', 'born','proyecto' ]
		};

		var userList = new List('users', options);

		/*var monkeyList = new List('users', {
  valueNames: ['name'],
  page: 4,
  pagination: true
});*/
	});

	
	
</script>
@endsection