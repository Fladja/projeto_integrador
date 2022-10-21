@extends('base')

@section('title')
Biblioteca Julia Medeiros
@stop

@section('head')
<link href="{{ asset('css/dashboardscreen.css') }}" rel="stylesheet">
@stop

@section('content')
	<main class="container">
		<div id="box-apresentacao" class="shadow-lg mt-5">
			<h1 class="text-center mt-4 mb-4">Biblioteca Julia Medeiros</h1>
			<div class="row justify-content-center text-center mt-4 mb-4">
				<div class="col-md-4">
					<a href="{{url('login')}}"><button class="btn btn-success">Fazer Login</button></a>
				</div>
				<div class="col-md-4">
					<a href="{{url('register')}}"><button class="btn btn-primary">Fazer Cadastro</button></a>
				</div>
			</div>
		</div>
	</main>
@stop


</body>
</html>