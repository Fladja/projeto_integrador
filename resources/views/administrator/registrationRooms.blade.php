<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Salas</title>
	<link href="{{ asset('css/cadastrarSala.css') }}" rel="stylesheet">

</head>
<body>
	<div class="corpo">
		<div class="corpo-afasta"></div>

		<div class="corpo-container">

			<div class="corpo-container-h3">
				<h3>Cadastrar Salas</h3>
			</div>


			<div class="corpo-container-form">
				<form method="POST" action="{{route('/cad_salas')}}">
					@csrf
					<p>Numero</p>
					<input id="input-text-1" type="text" name="numero_sala" placeholder="Numero da Sala">
					<p>Sala</p>
					<input id="input-text-2" type="text" name="codigo_sala" placeholder="Codigo da Sala">
					
					<div class="corpo-container-input-3">
						<input id="corpo-container-button-submit" type="submit" value="Cadastrar">
					</div>					
				</form>
			</div>			
		</div>
	</div>

</body>
</html>