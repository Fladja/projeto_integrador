<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Usuarios</title>
	<link href="{{ asset('css/cadastrarUsu.css') }}" rel="stylesheet">

</head>
<body>
	<div class="corpo">
		<div class="corpo-afasta"></div>

		<div class="corpo-container">

			<div class="corpo-container-h3">
				<h3>Cadastrar Usuario</h3>
			</div>


			<div class="corpo-container-form">
				<form method="POST" action="">
					@csrf
					<p>Matrícula</p>
					<input id="input-text-1" type="text" name="matriculaUsu" placeholder="Matrícula">
					<p>Senha</p>
					<input id="input-text-2" type="text" name="senhaUsu" placeholder="Senha">
					
					<div class="corpo-container-input-3">
						<input id="corpo-container-button-submit" type="submit" value="Cadastrar">
					</div>					
				</form>
			</div>			
		</div>
	</div>

</body>
</html>