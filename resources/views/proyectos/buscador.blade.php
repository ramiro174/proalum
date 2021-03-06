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
					<button class="sort btn btn-info btn-sm float-right col-lg-2 col-sm-2 col-md-2 offset-lg-1" data-sort="name">
						ABC.. <i class="fa fa-sort-desc float-right"></i>
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
									<a href="/perfilproyecto/{{$key->id}}" class="btn btn-primary ">Ver Proyecto</a>
								</div>
							</div>
						</li>

						@endforeach
						
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