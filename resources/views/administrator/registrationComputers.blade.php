<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Computadores</title>
	<link href="{{ asset('css/cadastrarComp.css') }}" rel="stylesheet">

</head>
<body>
	<div class="corpo">
		<div class="corpo-afasta"></div>

		<div class="corpo-container">

			<div class="corpo-container-h3">
				<h3>Cadastrar Computadores</h3>
			</div>


			<div class="corpo-container-form">
				<form method="POST" action="{{route('/cad_comput')}}">
					@csrf
					<p>Código do Computador</p>
					<input id="input-text-2" type="text" name="codigo_comput" placeholder="Informe o código do Computador">
					
					<div class="corpo-container-input-3">
						<input id="corpo-container-button-submit" type="submit" value="Cadastrar">
					</div>					
				</form>
			</div>			
		</div>
	</div>

</body>
</html>